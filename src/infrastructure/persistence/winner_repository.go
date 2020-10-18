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

	"github.com/ClanWolf/ToB/src/domain/tournament"
	"github.com/ClanWolf/ToB/src/infrastructure/container"
)

type winner struct {
	ID                            uint   `gorm:"column:id,primaryKey"`
	SortOrder                     uint   `gorm:"column:sortorder"`
	Clan                          string `gorm:"column:Clan"`
	Galaxy                        string `gorm:"column:Galaxy"`
	MechWarrior                   string `gorm:"column:MechWarrior"`
	Bloodname                     string `gorm:"column:Bloodright"`
	Sponsor                       string `gorm:"column:Sponsor"`
	TourneyHost                   string `gorm:"column:TournerHost"`
	TourneyStartTime              string `gorm:"column:TourneyStartTime"`
	Details                       string `gorm:"column:Details"`
	WitnessList                   string `gorm:"column:WitnessList"`
	RulesVersion                  string `gorm:"column:RulesVersion"`
	ChallongeTourneyLink          string `gorm:"column:ChallongeTourneyLink"`
	ChallongeResultScreenshotLink string `gorm:"column:ChallongeResultScreenshotLink"`
}

func (w winner) TableName() string {
	return "winners"
}

// Winner repository structure
type Winner struct {
	*base
}

// NewWinner injects the database connection to the repository object and
// returns it.
func NewWinner(dao *container.DataAccess) *Winner {
	return &Winner{
		base: newBase(dao.GetDB()),
	}
}

// Order sets the order column and direction for the query.
func (w *Winner) Order(value string) *Winner {
	w.base.conn.Order(value)
	return w
}

// Limit sets the limit for the query.
func (w *Winner) Limit(limit int) *Winner {
	w.base.conn = w.base.conn.Limit(limit)
	return w
}

// Offset sets the offset for the query.
func (w *Winner) Offset(limit int) *Winner {
	w.base.conn = w.base.conn.Offset(limit)
	return w
}

// GetAll returns all Winner records from the Winner.
func (w Winner) GetAll(ctx context.Context) ([]tournament.Winner, error) {
	winners := make([]tournament.Winner, 0)
	w.base.conn.Model(&winner{}).Find(&winners)
	if w.base.conn.Error != nil {
		return nil, w.base.conn.Error
	}

	return winners, nil
}
