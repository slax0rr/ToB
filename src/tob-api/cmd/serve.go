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
package cmd

import (
	"github.com/ClanWolf/ToB/src/infrastructure/container"
	"github.com/ClanWolf/ToB/src/interface/cli/serve"
	"github.com/jessevdk/go-flags"
	"github.com/spf13/cobra"
	"github.com/spf13/viper"
)

// serveCmd represents the serve command
var serveCmd = &cobra.Command{
	Use:   "serve",
	Short: "Start the API server",
	Long:  `Starts an API server for the Clan Wolf - Trial of Bloodright API.`,
	Run: func(cmd *cobra.Command, args []string) {
		container.InitDataAccess(container.DBConfig{
			Host:         viper.GetString("db.host"),
			Port:         viper.GetInt("db.port"),
			User:         viper.GetString("db.user"),
			Password:     viper.GetString("db.pass"),
			DatabaseName: viper.GetString("db.name"),
		})

		serve.Execute(serve.Config{
			Host:       viper.GetString("http.host"),
			Port:       viper.GetInt("http.port"),
			SocketPath: flags.Filename(viper.GetString("http.sockPath")),
		})
	},
}

func init() {
	rootCmd.AddCommand(serveCmd)

	serveCmd.PersistentFlags().String("http-host", "", "overrides configured IP address to listen on")
	serveCmd.PersistentFlags().Int("http-port", 0, "override configured port number to listen on")
	serveCmd.PersistentFlags().String("http-socket-path", "",
		"override configured path to the unix socket to listen on")

	viper.BindPFlag("http.host", serveCmd.PersistentFlags().Lookup("http-host"))
	viper.BindPFlag("http.port", serveCmd.PersistentFlags().Lookup("http-port"))
	viper.BindPFlag("http.socketFile", serveCmd.PersistentFlags().Lookup("http-socket-path"))
}
