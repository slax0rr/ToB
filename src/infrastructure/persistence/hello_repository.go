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
package persistence

import (
	"context"
	"errors"
)

var hello = map[string]string{
	"af": "Goeie dag",
	"sq": "Tungjatjeta",
	"ar": "Ahlan bik",
	"hr": "Zdravo",
	"cs": "Nazdar",
	"da": "Hallo",
	"nl": "Hallo",
	"en": "Hello",
	"fi": "Hei",
	"fr": "Bonjour",
	"de": "Guten Tag",
	"el": "Geia",
	"he": "Shalóm",
	"hi": "Namasté",
	"hu": "Szia",
	"id": "Hai",
	"ga": "Dia is muire dhuit",
	"it": "Buongiorno",
	"ja": "Kónnichi wa",
	"ko": "Annyeonghaseyo",
	"lv": "Es mīlu tevi",
	"ml": "Selamat petang",
	"no": "Hallo",
	"pl": "Witajcie",
	"pt": "Olá",
	"ro": "Salut",
	"ru": "Privét",
	"sk": "Nazdar",
	"sl": "Zdravo",
	"es": "Hola",
	"th": "Sàwàtdee kráp",
	"tr": "Merhaba",
	"uk": "Pryvít",
	"ur": "Adaab arz hai",
	"vi": "Chào",
}

type HelloRepo struct{}

// GetHelloString gets the translate hello from the internal map.
func (r *HelloRepo) GetHelloString(ctx context.Context, lang string) (string, error) {
	if msg, ok := hello[lang]; ok {
		return msg, nil
	}

	return "", errors.New("language not found")
}
