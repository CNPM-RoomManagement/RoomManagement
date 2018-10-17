<?php

    class View_Loader {
        private $__content = array();
        private $__layout = '';

        public function setLayout($layout) {
            if (file_exists(PATH_APPLICATION . '/view/layouts/' . $layout . '.php')) {
                $this->__layout = $layout;
            }
        }

        public function load($view, $data) {

            //Chuyển dữ liệu thành biến
            extract($data);
            // Chuyển nội dung view thành biến thay vì in ra bằng cách dùng ab_start()
            ob_start();

            if ($this->__layout) {
                require_once (PATH_APPLICATION . '/view/layouts/' . $this->__layout . '.php');
                $layout = ob_get_contents();
            } else {
                $layout = '';
            }

            ob_end_clean();

            ob_start();

            require_once PATH_APPLICATION . '/view/' . $view . '.php';

            $content = ob_get_contents();

            ob_end_clean();

            if ($layout) $content = str_replace('{{content}}', $content, $layout);

            // Gán nội dung vào danh sách view đã load
            $this->__content[] = $content;
        }

        public function show() {
            foreach ($this->__content as $html){
                echo $html;
            }
        }

        public function render($view, $data) {

            $this->load($view, $data);
            $this->show();
        }
    }
?>