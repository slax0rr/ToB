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
package container

import (
	"fmt"

	_ "github.com/go-sql-driver/mysql"
	"github.com/jinzhu/gorm"
)

// DBConfig for the database connection
type DBConfig struct {
	// Host on which the database is running
	Host string

	// Port on which the database is listening for connections
	Port int

	// User to authenticate as
	User string

	// Password of the authenticating user
	Password string

	// DatabaseName to connect to
	DatabaseName string
}

// DataAccess connection pool instance
type DataAccess struct {
	db  *gorm.DB
	cfg DBConfig
}

var dao *DataAccess

func GetDataAccessObject() *DataAccess {
	return dao
}

// InitDataAccess inits the DataAccess object with the provided database config.
func InitDataAccess(cfg DBConfig) {
	dao = &DataAccess{
		cfg: cfg,
	}
}

// Open the connection
func (dao *DataAccess) OpenDB() (err error) {
	port := dao.cfg.Port
	if port == 0 {
		port = 3306
	}

	dao.db, err = gorm.Open("mysql", fmt.Sprintf("%s:%s@tcp(%s:%d)/%s",
		dao.cfg.User, dao.cfg.Password, dao.cfg.Host, port, dao.cfg.DatabaseName))
	if err != nil {
		return err
	}

	dao.db.Exec("SELECT 1")
	return dao.db.Error
}

// Close the connection
func (dao *DataAccess) CloseDB() error {
	return dao.db.Close()
}

// GetDB returns the raw database connection object.
func (dao *DataAccess) GetDB() *gorm.DB {
	return dao.db
}
