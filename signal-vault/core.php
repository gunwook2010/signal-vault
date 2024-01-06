<?php
    require('config.php');
    require('core/db.php');
    /**
     * SIGNAL-VAULT CORE CLASS
     *
     * 이 클래스는 SIGNAL-VAULT의 코어 클래스에요.
     */
    class Core {
        private $config;
        private $db;
    
        public function __construct() {
            $this->config = new Config();
            $this->db = new DB();
        }
        /**
         * SVCORE CONFIG
         * 설정파일의 특정 값을 읽어와요.
         *
         * @param string $key 설정값 key 이름
         * @return string 설정값
         */
        public function getConfig($key) {
            return $this->config->getConfigValue($key);
        }
        /**
         * SVCORE DB
         * 연결된 DB에 쿼리를 보내요.
         * 
         * @param string $value 쿼리
         * @return string 쿼리 결과
         */
        public function query($value) {
            return $this->db->SV_query($value);
        }
    }
?>