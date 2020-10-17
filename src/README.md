# Go WebApp Scaffolding

Go WebApp Scaffolding is a simple Onion-Architecture-Based directory structure
for web applications written in Go. It also provides a simple HTTP server,
bundled with the [gorilla/mux](https://github.com/gorilla/mux) router and
dispatcher to get you started with your web application.

## Tools used

A list of tools and libraries used in the scaffold:

* [spf13/cobra](https://github.com/spf13/cobra) - CLI commands
* [spf13/viper](https://github.com/spf13/viper) - Config parser
* [gorilla/mux](https://github.com/gorilla/mux) - HTTP router
* [adams-sarah/test2doc](https://github.com/adams-sarah/test2doc) -
Documentation generator
* [slax0rr/go-httpserver](https://gitlab.com/slax0rr/go-httpserver) - HTTP
server
* [sirupsen/logrus](https://github.com/sirupsen/logrus) - Logger
* [go-delve/delve](https://github.com/go-delve/delve) debugger

## Install

To install and use the scaffolding simply download the project files and extract
them to your project root.

The import paths and some filenames include this projects paths and names. To
rename and personalize to your needs execute:

```sh
NEW_CMD_NAME=yourappname \
    NEW_REPO_PATH=gitlab.com/your-group/your-project-name \
    make prep
```

This will change all imports from *github.com/ClanWolf/ToB/src* to
`$NEW_REPO_PATH` and occurrences of *tob-api* to `$NEW_CMD_NAME`, including
file renames.

## Usage

The scaffolding comes with a very simple example of *Hello, World!* which should
be a small guide of where to put what, however you can freely switch to a
different layout should you feel like it. Nevertheless here is a few words
regarding the chosen layout and what goes where.

### CLI commands

If you have already executed the `make prep` from the above section, this
directory will be named whatever you set the `$NEW_CMD_NAME` variable to, if not
look at **/web/scaffolding/**. This directory holds the command definitions. The
project uses the [spf13/cobra](https://github.com/spf13/cobra) library for
command generation.  Out of the box the **serve** command is already available
and it is used to start the HTTP server. To add a new command execute in the
shell:

```shell
cd tob-api # use the name from $NEW_CMD_NAME if you ran `make prep` already
cobra add cmd_name
```

The *serve* command handler is located in the `interface/cli/serve/cmd.go` file.

### Configuration

The basic configuration file is located in `resources/config/tob-api.yaml`
file. Again, if you already executed the `make prep` command the file name will
be whatever you set the `$NEW_CMD_NAME` variable to. In the code the
[spf13/viper](https://github.com/spf13/viper) configuration library is used to
parse and read the configuration file.

### HTTP Handlers

The HTTP handler of the example application is located in the
`interface/http/hello/` directory where you can find the handler and a small
test created for it.  All handlers must be added to the *handlers slice*
located in `infrastructure/container/handlers.go` file in order to be
automatically registered with the router.

### Documentation

The example uses the
[adams-sarah/test2doc](https://github.com/adams-sarah/test2doc) library that
automatically generates an [API Blueprint](https://apiblueprint.org/) file in
every HTTP handlers directory. To combine all documentation files to a single
*apib* file execute:

```shell
make docs
```

This will write a single `docs/apiary.apib` file which you can upload to an API
Blueprint host like [Apiary](https://apiary.io/), or use your own renderer and
host your own docs where you want.

### Running the server

To run the server invoke *make* with the run target:

```shell
make run
```

This will start the HTTP server.

### Debugging

To debug your application ensure you have
[go-delve/delve](https://github.com/go-delve/delve) installed. After that simply
execute:

```shell
make debug
```

This will start the debugger in a headless mode listening on
**127.0.0.1:40000**. You can edit this address in the *Makefile*.
