GOCMD=go
CURL=curl
DLV=dlv
SUDO=sudo
MOVE=mv
CHMOD=chmod
DKC=docker-compose

REPO_PATH=github.com/ClanWolf/ToB/src
CMD_PATH=${REPO_PATH}/tob-api
BIN_PATH=./tmp/bin
CMD_NAME=tob-api
CFG_PATH=resources/config
CFG_FILE=${CFG_PATH}/tob-api.yaml
DEBUG_LISTEN=127.0.0.1:40000
DOCS_FILE=docs/apiary

SWAGGER_GEN_VERSION=v0.25.0
SWAGGER_GEN_URL=https://github.com/go-swagger/go-swagger/releases/download/${SWAGGER_GEN_VERSION}/swagger_linux_amd64
SWAGGER_GEN_BIN=/usr/local/bin/swagger

.PHONY: test build run debug docs prep

default: all

all: test build run

test:
	${GOCMD} test -v ./...

build:
	${DKC} build api

run: build
	${DKC} up -d api

debug: EXEC_CMD ?= serve
debug:
	${DLV} debug \
		--listen ${DEBUG_LISTEN} \
		--headless \
		${CMD_PATH} -- \
			${EXEC_CMD} \
			--config ${CFG_FILE}

docs: test
	@cp ${DOCS_FILE}.tpl ${DOCS_FILE}.apib
	@find . -type f -not -path './docs/*' -name "*.apib" \
		\( -exec cat {} >> ${DOCS_FILE}.apib \; \
		-a -exec rm {} \; \)
	@echo "docs generated in '${DOCS_FILE}.apib'"

prep:
ifndef NEW_REPO_PATH
	@echo error: NEW_REPO_PATH is not set!
	exit 1
endif
ifndef NEW_CMD_NAME
	@echo error: NEW_CMD_NAME is not set!
	exit 1
endif
	@find -type f -not -path '*/\.git\/*' \
		\( -exec sed -i -e 's#${REPO_PATH}#${NEW_REPO_PATH}#' {} \; \
		-a -exec sed -i -e 's#${CMD_NAME}#${NEW_CMD_NAME}#' {} \; \)

	@mv ${CMD_NAME} ${NEW_CMD_NAME}
	@mv ${CFG_PATH}/${CMD_NAME}.yaml ${CFG_PATH}/${NEW_CMD_NAME}.yaml

install-swagger:
	${CURL} --retry-connrefused --retry 5 -Lo swagger_bin \
		${SWAGGER_GEN_URL}

	${SUDO} ${MOVE} swagger_bin ${SWAGGER_GEN_BIN}
	${SUDO} ${CHMOD} +x ${SWAGGER_GEN_BIN}

gen-server:
	swagger generate server \
		--target=infrastructure/restapi \
		--skip-operations \
		--skip-support
	swagger generate server \
		--target=infrastructure \
		--skip-models \
		--exclude-main \
		--model-package=restapi/models
