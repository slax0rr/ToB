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
package health

import (
	operations "github.com/ClanWolf/ToB/src/infrastructure/restapi/operations/health"
	"github.com/go-openapi/runtime/middleware"
)

// TODO(slax0rr): check DB connectivity
func HandleGet(params operations.GetHealthParams) middleware.Responder {
	return operations.NewGetHealthOK()
}