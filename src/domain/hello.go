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
package domain

import (
	"context"
	"fmt"
)

// Hello entity holds the hello message and the language of the message.
type Hello struct {
	Lang string
	Msg  string
}

func (h *Hello) GetGreeting(ctx context.Context, name string) (string, error) {
	var err error
	h.Msg, err = helloRepoImpl.GetHelloString(ctx, h.Lang)
	if err != nil {
		return "", err
	}

	return fmt.Sprintf("%s, %s!", h.Msg, name), nil
}

// HelloRepo represents the repository for the Hello entity.
type HelloRepo interface {
	GetHelloString(context.Context, string) (string, error)
}

var helloRepoImpl HelloRepo

// InitHelloRepo sets the repo implementation object to the pkg var.
func InitHelloRepo(impl HelloRepo) {
	helloRepoImpl = impl
}
