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
package tournament

import (
	"github.com/ClanWolf/ToB/src/application"
	"github.com/ClanWolf/ToB/src/infrastructure/restapi/models"
	operations "github.com/ClanWolf/ToB/src/infrastructure/restapi/operations/tournament"
	"github.com/go-openapi/runtime/middleware"
)

func HandleGetTournamentWinners(params operations.GetTournamentWinnersParams) middleware.Responder {
	winnersMap, err := application.GetTournamentWinnersPerBloodname(params.HTTPRequest.Context())
	if err != nil {
		// TODO(slax0rr): use pre-defined errors
		operations.NewGetTournamentWinnersInternalServerError().WithPayload(&models.APIError{
			ErrorMessage: "Critical error occurred",
		})
		return nil
	}

	response := make(models.TournamentWinners)
	for bloodname, winners := range winnersMap {
		response[bloodname] = make([]models.TournamentWinner, len(winners))

		for i, w := range winners {
			response[bloodname][i] = models.TournamentWinner{
				Bloodname:           w.Bloodname,
				Clan:                w.Clan,
				Galaxy:              w.Galaxy,
				ID:                  int64(w.ID),
				Rank:                w.Rank,
				Sponsor:             w.Sponsor,
				TournamentHost:      w.TourneyHost,
				TournamentStartTime: w.TourneyStartTime,
				Warrior:             w.MechWarrior,
			}
		}
	}

	return operations.NewGetTournamentWinnersOK().
		WithPayload(response)
}
