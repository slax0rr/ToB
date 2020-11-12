$(document).ready(() => {
  getWinners().
    then(populateWinners).
    then(initScroll)
});

// populateWinners populates the tournament winners table in the DOM.
const populateWinners = (winners) => {
  Object.keys(winners).forEach(bloodname => {
    if (winners[bloodname].length === 0) {
      return true;
    }

    $('#winners-table > tbody').append(bloodnameToRow(bloodname));

    winners[bloodname].forEach(warrior => {
      $('#winners-table > tbody').append(warriorToRow(warrior));
    })

  })
}

// warriorToRow creates a new <tr> element with the warrior data.
const warriorToRow = (warrior) => {
  return $('<tr>').
    append($('<td>').text(warrior.clan)).
    append($('<td>').text(warrior.galaxy)).
    append($('<td>').attr('width', '24px').css('text-align', 'center').html(rankImage(warrior.rank))).
    append($('<td>').text(`${warrior.warrior} ${warrior.bloodname}`)). // check for link
    append($('<td>').text(warrior.sponsor)).
    append($('<td>').text(warrior.tournament_host)).
    append($('<td>').text(warrior.tournament_start_time))
}

// bloodnameToRow creates a new <tr> element for the bloodname.
const bloodnameToRow = (bloodname) => {
  const text = $('<h4>').text(`House of ${bloodname}`)
  const cell = $('<td>').
    attr('colspan', 7).
    attr('align', 'center').
    css('text-align', 'center').
    html(text);

  return $('<tr>').append(cell);
}

// getWinners loads tournament winners from the API and returns an object of all
// winners with the bloodnames as keys.
const getWinners = async () => {
  var winners = {
    Ward: [],
    Kerensky: [],
    Fetladral: [],
    Conners: [],
    Rhyde: [],
    Other: [],
  };

  await tobAPI.get('tournament/winners').then(function(resp) {
    Object.keys(resp.data).forEach(bloodname => {
      if (bloodname in winners) {
        winners[bloodname] = resp.data[bloodname]
        return true;
      }

      resp.data[bloodname].forEach(warrior => {
        winners.Other.push(warrior)
      });
    });
  });

  return winners;
}

// rankImage creates an <img> tag with the rank image source.
const rankImage = (rank) => {
  return $('<img>').attr('src', `${appData.baseurl}/img/rank/${rank}.png`).attr('width', '16px');
}
