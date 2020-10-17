package hello

import (
	"testing"

	"github.com/adams-sarah/test2doc/test"
	"github.com/adams-sarah/test2doc/vars"
	"github.com/gorilla/mux"
	"github.com/remogatto/prettytest"
	"github.com/ClanWolf/ToB/src/application"
	"github.com/ClanWolf/ToB/src/infrastructure/persistence"
)

var server *test.Server
var rtr *mux.Router

type helloHandlerTestSuite struct {
	prettytest.Suite
}

func TestRunner(t *testing.T) {
	rtr = mux.NewRouter()

	handler := NewHandler(&application.HelloImpl{})
	handler.Register(rtr)

	test.RegisterURLVarExtractor(vars.MakeGorillaMuxExtractor(rtr))

	var err error
	server, err = test.NewServer(rtr)
	if err != nil {
		t.Errorf("unable to create test server, %s", err)
	}
	defer server.Finish()

	persistence.Init()

	prettytest.RunWithFormatter(t,
		new(prettytest.TDDFormatter),
		new(helloHandlerTestSuite))
}
