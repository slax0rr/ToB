var winners = {};

$(document).ready(function() {
  tobAPI.get('tournament/winners').then(function(resp) {
    Object.keys(resp.data).forEach(bloodname => {
      console.log(bloodname, resp.data[bloodname])
    })
  })
});
