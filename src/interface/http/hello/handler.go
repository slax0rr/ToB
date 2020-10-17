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
package hello

import (
	"fmt"
	"net/http"

	"github.com/gorilla/mux"
	"github.com/sirupsen/logrus"
	"github.com/ClanWolf/ToB/src/application"
)

type Hello struct {
	helloApp application.Hello
}

// NewHandler creates an instance of the Hello handler.
func NewHandler(
	helloApp application.Hello,
) *Hello {
	return &Hello{helloApp}
}

// Register registers the handler endpoints to the router.
func (h Hello) Register(rtr *mux.Router) {
	rtr.Path("/{lang:[a-z]{2}}/hello/{name}").
		HandlerFunc(h.Greet).
		Methods(http.MethodGet).
		Name("Greet")
}

// Greet takes the language spec and name from the URI, and calls the Hello application service, which constructs a greeting in the specified language for the name and returns it.
func (h *Hello) Greet(w http.ResponseWriter, req *http.Request) {
	vars := mux.Vars(req)
	hello, err := h.helloApp.Greet(req.Context(), vars["lang"], vars["name"])
	if err != nil {
		logrus.WithError(err).Error("unable to obtain a list of hellos")
		w.WriteHeader(http.StatusInternalServerError)
		fmt.Fprint(w, err)
		return
	}

	fmt.Fprint(w, hello)
}
