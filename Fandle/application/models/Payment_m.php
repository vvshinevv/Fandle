<?php
class Payment_m extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function insert_delivery($table = 'delivery', $arrays) {

        $insert_array = array(
            'projects_num'=>$arrays['projects_num'],
            'reward_num'=>$arrays['reward_num'],
            'pg_provider'=>$arrays['pg_provider'],
            'pay_method'=>$arrays['pay_method'],
            'escrow'=>$arrays['escrow'],
            'merchant_uid'=>$arrays['merchant_uid'],
            'name'=>$arrays['name'],
            'amount'=>$arrays['amount'],
            'reward_amount'=>$arrays['reward_amount'],
            'shipping_amount'=>$arrays['shipping_amount'],
            'buyer_email'=>$arrays['buyer_email'],
            'buyer_name'=>$arrays['buyer_name'],
            'buyer_tel'=>$arrays['buyer_tel'],
            'buyer_addr'=>$arrays['buyer_addr'],
            'buyer_addr_detail'=>$arrays['buyer_addr_detail'],
            'buyer_postcode'=>$arrays['buyer_postcode'],
            'buyer_nation'=>$arrays['buyer_nation'],
            'buyer_city'=>$arrays['buyer_city'],
            'buyer_state'=>$arrays['buyer_state'],
            'shipping_method'=>$arrays['shipping_method'],
            'note'=>$arrays['note']
        );

        $result = $this->db->insert($table, $insert_array);

        return $result;
    }
}