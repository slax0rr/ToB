package application

import (
	"context"

	"github.com/ClanWolf/ToB/src/domain/tournament"
	"github.com/ClanWolf/ToB/src/infrastructure/container"
	"github.com/ClanWolf/ToB/src/infrastructure/persistence"
)

func GetTournamentWinnersPerBloodname(ctx context.Context) (tournament.WinnersPerBloodname, error) {
	tournament.InitWinnerRepo(persistence.NewWinner(container.GetDataAccessObject()))

	winners := make(tournament.WinnersPerBloodname)
	err := winners.GetAll(ctx)
	if err != nil {
		return nil, err
	}

	return winners, nil
}
