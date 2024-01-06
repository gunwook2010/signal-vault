<?php
/*
    SIGNAL-VAULT DB FILE
*/

    /**
     * SIGNAL-VAULT DB CLASS
     *
     * 이 클래스는 SIGNAL-VAULT의 DB 클래스에요.
     * DB 쿼리는 Core->query()를 이용해주세요.
     */
    class DB extends Core {
        protected $SVCORE_db_connect;
        protected $SVCORE_db_connect_status_flag = false;
        protected $SVCORE_db_connect_status = '';
        function __construct() {
            $this->SVCORE_db_connect = new mysqli($this->config->SVC_dbhost, $this->config->SVC_id, $this->config->SVC_password, $this->config->SVC_dbname);

            if ($this->SVCORE_db_connect->connect_error) {
                $this->SVCORE_db_connect_status_flag = false;
                $this->SVCORE_db_connect_status = $this->SVCORE_db_connect->connect_error;
                die('연결 실패: ' . $this->SVCORE_db_connect->connect_error);
            } else {
                $this->SVCORE_db_connect_status_flag = true;
                $this->SVCORE_db_connect_status = 'DB와 성공적으로 연결했어요.';
                echo "연결 성공";
            }
        }
        public function SV_query($SVCORE_db_query) {
            return $this->SVCORE_db_connect->query($SVCORE_db_query);
        }
    }
 ?>