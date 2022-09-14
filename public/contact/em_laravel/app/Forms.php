<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forms extends Model {
  protected $guarded = [
    'id',
  ];

  static $sp_time_tag   = [
    "#YYYY#" => "admin_messages.form.four_digit_year_tag",
    "#YY#"   => "admin_messages.form.two_digit_year_tag",
    "#MM#"   => "admin_messages.form.two_digit_year_tag",
    "#DD#"   => "admin_messages.form.day_tag",
    "#KWE#"  => "admin_messages.form.kwe_tag",
    "#AWE#"  => "admin_messages.form.awe_tag",
    "#HH#"   => "admin_messages.form.hour_tag",
    "#MI#"   => "admin_messages.form.min_tag",
    "#SS#"   => "admin_messages.form.sec_tag",
  ];
  static $sp_sender_tag = [
    "#IP#"   => "admin_messages.form.ipaddress_tag",
    "#HOST#" => "admin_messages.form.host_tag",
    "#UA#"   => "admin_messages.form.user_agent_tag",
    "#UA#"   => "admin_messages.form.user_agent_tag",
    "#UA#"   => "admin_messages.form.user_agent_tag",
  ];

  static function get_use_form_item_name( $block_id ) {
    return Forms::select( "forms.name", "forms.url" )
      ->where( "form_items.form_block_id", "=", $block_id )
      ->leftJoin( 'form_items', 'form_items.form_id', '=', 'forms.id' )
      ->orderBy( "form_items.form_block_id", "asc" )
      ->get();
  }
}
