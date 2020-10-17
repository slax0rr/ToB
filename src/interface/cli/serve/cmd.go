/*
Copyright © 2020 Tomaz Lovrec <tomaz@lovrec.dev>

Licensed under the Apache License, Version 2.0 (the "License");
you may not use this file except in compliance with the License.
You may obtain a copy of the License at

    http://www.apache.org/licenses/LICENSE-2.0

Unless required by applicable law or agreed to in writing, software
distributed under the License is distributed on an "AS IS" BASIS,
WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
See the License for the specific language governing permissions and
limitations under the License.
*/
package serve

import (
	"github.com/ClanWolf/ToB/src/infrastructure/restapi"
	"github.com/ClanWolf/ToB/src/infrastructure/restapi/operations"
	healthop "github.com/ClanWolf/ToB/src/infrastructure/restapi/operations/health"
	"github.com/ClanWolf/ToB/src/interface/http/health"
	"github.com/go-openapi/loads"
	"github.com/jessevdk/go-flags"
	"github.com/sirupsen/logrus"
)

// Config of the API HTTP server
type Config struct {
	// Host on which the server is listening
	Host string

	// Port on which the server is listening
	Port int

	// SocketPath to the UNIX socket file for the server to listen on
	SocketPath flags.Filename
}

func Execute(srvrCfg Config) {
	logrus.WithField("config", srvrCfg).Debug("starting an http server")

	swaggerSpec, err := loads.Embedded(restapi.SwaggerJSON, restapi.FlatSwaggerJSON)
	if err != nil {
		logrus.WithError(err).Panic("unable to load swagger spec")
	}

	api := operations.NewClanWolfAPI(swaggerSpec)
	registerHandlers(api)

	server := restapi.NewServer(api)
	defer server.Shutdown()

	server.Host = srvrCfg.Host
	server.Port = srvrCfg.Port
	server.SocketPath = srvrCfg.SocketPath

	server.ConfigureAPI()

	if err := server.Serve(); err != nil {
		logrus.WithError(err).Panic("http server failed")
	}
}

func registerHandlers(api *operations.ClanWolfAPI) {
	api.HealthGetHealthHandler = healthop.GetHealthHandlerFunc(health.HandleGet)
}
