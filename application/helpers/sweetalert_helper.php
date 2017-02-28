<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    function swal($msg='이동합니다', $url='') {
        $CI =& get_instance();

        echo "<body>";
        echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>';
        echo "<link rel=\"stylesheet\" href=\"https://cdn.jsdelivr.net/sweetalert2/4.0.16/sweetalert2.min.css\">";
        echo "<script src=\"https://cdn.jsdelivr.net/sweetalert2/4.0.16/sweetalert2.min.js\"></script>";
        echo "
            <script type='text/javascript'>
                swal('".$msg."').then(function() {
                    location.replace('".$url."');
                });
                
            </script>
            ";
        echo "</body>";


        exit;
    }

    function swal_close($msg) {
        $CI =& get_instance();

        echo "<body>";
        echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>';
        echo "<link rel=\"stylesheet\" href=\"https://cdn.jsdelivr.net/sweetalert2/4.0.16/sweetalert2.min.css\">";
        echo "<script src=\"https://cdn.jsdelivr.net/sweetalert2/4.0.16/sweetalert2.min.js\"></script>";
        echo "
            <script type='text/javascript'>
                swal('".$msg."');
            </script>
        ";
        echo "</body>";

        exit;
    }

//    function swal_password($title) {
//        $CI =& get_instance();
//
//        echo "<body>";
//        echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>';
//        echo "<link rel=\"stylesheet\" href=\"https://cdn.jsdelivr.net/sweetalert2/4.0.16/sweetalert2.min.css\">";
//        echo "<script src=\"https://cdn.jsdelivr.net/sweetalert2/4.0.16/sweetalert2.min.js\"></script>";
//
//        echo "
//            <script type='text/javascript'>
//                swal({
//                   title :  ".$title.",
//                   input : 'password',
//                   inputAttributes : {
//                        'maxlength': 3,
//                        'autocapitalize': 'off',
//                        'autocorrect': 'off'
//                   }
//                }).then(
//                    if(checkPassword(password) == TRUE) {
//
//                    } else {
//
//                    }
//                );
//
//                function checkPassword(password) {
//                    $.post('/index.php/path/checkPassword',{
//                        'email': ".$this->session->userdata('email')."
//                    });
//                }
//            </script>
//        ";
//
//        echo "</body>";
//
//        exit;
//    }