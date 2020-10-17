package hello

import (
	"fmt"
	"io/ioutil"
	"net/http"
)

func (t *helloHandlerTestSuite) TestGreet() {
	urlPath, err := rtr.Get("Greet").URL("lang", "en", "name", "Foo")
	t.Nil(err, fmt.Sprintf("error: %s", err))

	resp, err := http.Get(server.URL + urlPath.String())
	t.Nil(err, fmt.Sprintf("error: %s", err))
	t.Equal(http.StatusOK, resp.StatusCode, "status not 200")

	defer resp.Body.Close()
	body, err := ioutil.ReadAll(resp.Body)
	t.Nil(err, fmt.Sprintf("error: %s", err))

	t.Equal("Hello, Foo!", string(body), "body yielded unexpected value")
}
