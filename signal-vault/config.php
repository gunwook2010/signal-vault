<?php
/*
    SIGNAL-VAULT CONFIG FILE
*/

// DB CONFIG
/**
 * SIGNAL-VAULT CONFIG CLASS
 *
 * 이 클래스는 SIGNAL-VAULT의 설정을 저장해요.
 * 설정값의 접근은 Core->getConfig()를 이용해주세요.
 */
class Config extends Core {
    protected $SVC_dbtype = 'mariadb'; // DB 종류(mysql/mariadb)
    protected $SVC_dbhost = 'localhost'; // DB 호스트
    protected $SVC_dbport = '3306'; // DB 포트
    protected $SVC_dbname = 'signalvault'; // 데이터베이스 이름
    protected $SVC_id = 'signalvault'; // DB 아이디
    protected $SVC_password = 'signalvault'; // DB 비밀번호
    protected $SVC_securedb = false; // 중요 정보를 다른 데이터베이스에 저장(true/false)
    // protected $SVC_securedb_dbtype = 'mariadb'; // 보안 DB 종류(mysql/mariadb)
    // protected $SVC_securedb_dbhost = 'localhost'; // 보안 DB 호스트
    // protected $SVC_securedb_dbport = '3306'; // 보안 DB 포트
    // protected $SVC_securedb_dbname = 'signalvault'; // 보안 데이터베이스 이름
    // protected $SVC_securedb_id = 'root'; // 보안 DB 아이디
    // protected $SVC_securedb_password = 'p@55w0rd!'; // 보안 DB 비밀번호

    // DB TABLE CONFIG
    protected $SVC_db_prefix = 'SVC_';
    protected $SVC_db_user;
    protected $SVC_db_pricert;
    protected $SVC_db_pubcert;
    protected $SVC_db_encmsg;
    protected $SVC_db_msg;

    public function __construct() {
        $this->SVC_db_user = $this->SVC_db_prefix . 'user'; // 유저 정보 저장
        $this->SVC_db_pricert = $this->SVC_db_prefix . 'cert'; // 유저 개인키 저장 / securedb
        $this->SVC_db_pubcert = $this->SVC_db_prefix . 'cert'; // 유저 공개키 저장
        $this->SVC_db_encmsg = $this->SVC_db_prefix . 'encmessage'; // 암호화된 메시지 저장 / securedb
        $this->SVC_db_msg = $this->SVC_db_prefix . 'message'; // 일반 메시지 저장
    }

    public function getConfigValue($key) {
        $property = 'SVC_' . $key;
        if (property_exists($this, $property)) {
            return $this->{$property};
        } else {
            return 'null'; // 속성이 없는 경우에 대한 처리
        }
    }
}
?>
