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
	"context"
	"errors"

	"github.com/sirupsen/logrus"
)

// TODO(slax0rr): figure out a way to keep `gorm` tags away from domain
type Winner struct {
	ID               uint   `gorm:"column:id"`
	Clan             string `gorm:"column:Clan"`
	Galaxy           string `gorm:"column:Galaxy"`
	MechWarrior      string `gorm:"column:MechWarrior"`
	Bloodname        string `gorm:"column:Bloodright"`
	Sponsor          string `gorm:"column:Sponsor"`
	TourneyHost      string `gorm:"column:TournerHost"`
	TourneyStartTime string `gorm:"column:TourneyStartTime"`
}

type WinnersPerBloodname map[string][]Winner

func (wpb *WinnersPerBloodname) GetAll(ctx context.Context) error {
	if wpb == nil {
		return errors.New("call to GetAll on a nil map")
	}

	winners, err := winnerRepoImpl.GetAll(ctx)
	if err != nil {
		logrus.WithError(err).Error("unable to retrieve all tournament winners")
		return err
	}

	winnersMap := make(WinnersPerBloodname)
	for _, winner := range winners {
		if _, ok := winnersMap[winner.Bloodname]; !ok {
			winnersMap[winner.Bloodname] = make([]Winner, 0, 2)
		}

		winnersMap[winner.Bloodname] = append(winnersMap[winner.Bloodname], winner)
	}

	*wpb = winnersMap

	return nil
}

// WinnerRepo represents the repository for the Winner entity.
type WinnerRepo interface {
	GetAll(context.Context) ([]Winner, error)
}

var winnerRepoImpl WinnerRepo

// InitWinnerRepo sets the repo implementation object to the pkg var.
func InitWinnerRepo(impl WinnerRepo) {
	winnerRepoImpl = impl
}
