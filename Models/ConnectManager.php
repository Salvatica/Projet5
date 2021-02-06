<?php


namespace Blog\Models;


class ConnectManager extends Model
{
    const GET_ALL_USERS_SQL_REQUEST = "SELECT * FROM user";
    const GET_ONE_USER_BY_ID_SQL_REQUEST = "SELECT name FROM user WHERE id_user = :id";

    private $userManager;
}