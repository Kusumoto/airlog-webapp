<?php 
/* 
 * @package	Software Analysis and Maintenance Framework
 * @author	SAMF Dev Team
 * @copyright	Copyright (c) 2015, SAMF Dev Team
 * @license	http://opensource.org/licenses/Apache-2.0
 * @since	Version 1.0.0
 *
 */

 if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 /**
 * Thai langage
 *
 * The language menu for SAMF
 *
 * @package		Software Analysis and Maintenance Framework
 * @category	Multilanguage:Thai langage
 * @author		SAMF Dev Team
 */

 /**
  * Often word
  */
 // often word of basic menu and basic word
 $lang['home'] = "หน้าแรก";
 $lang['application'] = "แอพพลิเคชั่น";
 $lang['overview'] = "ภาพรวม";
 $lang['manage'] = "การจัดการ";
 // month
 $lang['jan'] = "มกราคม";
 $lang['feb'] = "กุมภาพันธ์";
 $lang['mar'] = "มีนาคม";
 $lang['apil'] = "เมษายน";
 $lang['may'] = "พฤษภาคม";
 $lang['june'] = "มิถุนายน";
 $lang['july'] = "กรกฎาคม";
 $lang['aug'] = "สิงหาคม";
 $lang['sep'] = "กันยายน";
 $lang['oct'] = "ตุลาคม";
 $lang['nov'] = "พฤศจิกายน";
 $lang['dec'] = "ธันวาคม";

 /**
  * Template menu 
  */
 $lang['menu_hello'] = "สวัสดีคุณ ";
 $lang['menu_online'] = "ออนไลน์";
 $lang['menu_dashboard'] = "แดชบอร์ด";
 $lang['menu_applications'] = "แอพพลิเคชั่น";
 $lang['menu_log_report'] = "รายงานล็อค";
 $lang['menu_manage'] = "การจัดการ";
 $lang['menu_application_functions'] = "แอพพลิเคชั่นฟังก์ชัน";
 $lang['menu_users_management'] = "การจัดการผู้ใช้งาน";
 $lang['menu_api_management'] = "จัดการ API";
 $lang['menu_setting'] = "ตั้งค่าระบบ";

 /**
  * Dashboard
  */
 $lang['dash_dash'] = "แดชบอร์ด";
 $lang['dash_con_panel'] = "แผงควบคุม";
 $lang['dash_apps'] = "แอพพลิเคชั่น";
 $lang['dash_more_info'] = "ดูเพิ่มเติม";
 $lang['dash_app_funce'] = "แอพพลิเคชั่น ฟังก์ชัน";
 $lang['dash_users_in_sys'] = "ผู้ใช้งานในระบบ";
 $lang['dash_sys_warning'] = "ระบบที่คาดว่าจะเกิดปัญหา";
 $lang['dash_all_app_summ_stat'] = "ข้อมูลสรุปทั้งหมดของแอพพลิเคชั่นเชิงสถิติ";
 $lang['dash_day'] = "วัน";
 $lang['dash_month'] = "เดือน";
 $lang['dash_year'] = "ปี";
 $lang['dash_all_app_used_stat'] = "แอพพลิเคชั่นทั้งหมดของที่ใช้ข้อมูลเชิงสถิติ";
 $lang['dash_app_func_ratio'] = "อัตราส่วนของแอพพลิเคชั่นฟังก์ชัน";
 $lang['dash_sys_manage'] = "การจัดการระบบ";
 $lang['dash_shutdown'] = "ปิดการทำงาน";
 $lang['dash_reboot'] = "เริ่มการทำงานระบบใหม่";
 $lang['dash_re_web_serv'] = "เริ่มการทำงานของเว็บเซอร์วิส";
 $lang['dash_re_db_serv'] = "เริ่มการทำงานของ Database Service";
 $lang['dash_server_load'] = "การทำงานของ Server";
 $lang['dash_serv_status'] = "สถานะของ Service";
 $lang['dash_web_serv'] = "เว็บเซอร์วิส";
 $lang['dash_db'] = "ฐานข้อมูล";
 $lang['dash_web_app'] = "เว็บแอพพลิเคชั่น";
 $lang['dash_total_log_in_day'] = "การเก็บล็อคทั้งหมดในรายวัน";
 $lang['dash_total_log_in_month'] = "การเก็บล็อคทั้งหมดในรายเดือน";
 $lang['dash_total_log_in_year'] = "การเก็บล็อคทั้งหมดในรายปี";
 $lang['dash_total_all_func_use_in_day'] = "ฟังก์ชันทั้งหมดในรายวัน";
 $lang['dash_total_all_func_use_in_month'] = "ฟังก์ชันทั้งหมดในรายเดือน";
 $lang['dash_total_all_func_use_in_year'] = "ฟังก์ชันทั้งหมดในรายปี";
 $lang['dash_ratio_func_in_sys'] = "อัตราส่วนของฟังก์ชั่นที่มีในระบบ";

 /**
  * Application
  */
 // app_peroverview
 $lang['id'] = "ไอดี";
 $lang['application_overview'] = "ภาพรวมทั้งหมดของแอพพลิเคชั่น";
 $lang['action'] = "การทำงาน";
 // app_overview
 $lang['app_ov_overview'] = "ภาพรวมของ";
 $lang['app_ov_disp_set'] = "ตั้งค่าการแสดง";
 $lang['app_ov_date'] = "วันที่:";
 $lang['app_ov_quick_menu'] = "เมนูลัด";
 $lang['app_ov_function'] = "ฟังก์ชัน";
 $lang['app_ov_report'] = "รายงาน";
 $lang['app_ov_enable_agent'] = "เปิด Agent";
 $lang['app_ov_disable_agent'] = "ปิด Agent";
 $lang['app_ov_edit_app'] = "แก้ไขแอพฯ";
 $lang['app_ov_remove_app'] = "ลบแอพฯ";
 $lang['app_ov_app_sum_stat'] = "สรุปช้อมูลแอพพลิเคชั่นในชิงสถิติ";
 $lang['app_ov_day'] = "วัน";
 $lang['app_ov_month'] = "เดือน";
 $lang['app_ov_year'] = "ปี";
 $lang['app_ov_app_used_stat'] = "ข้อมูลแอพพลิเคชั่นฟังก์ชันในเชิงสถิติ";
 $lang['app_ov_app_sum_rat'] = "ข้อมูลแอพพลิเคชั่นฟังก์ชันสรุปในเชิงอัตราส่วน";
 $lang['app_ov_total_app'] = "แอพพลิเคชั่นทั้งหมดของ ";
 $lang['app_ov_log_in_day'] = " ที่เก็บล็อครายวัน";
 $lang['app_ov_log_in_month'] = " ที่เก็บล็อครายเดือน";
 $lang['app_ov_log_in_year'] = " ที่เก็บล็อครายปี";
 $lang['app_ov_total_apps'] = "แอพพลิเคชั่นทั้งหมดของ ";
 $lang['app_ov_use_in_day'] = " ที่ใช้ในรายวัน";
 $lang['app_ov_use_in_month'] = " ที่ใช้ในรายเดือน";
 $lang['app_ov_use_in_year'] = " ที่ใช้ในรายปี";
 $lang['app_ov_ratio_log_type_in_app'] = "อัตราส่วนการเก็บ log แต่ละประเภทในแอพพลิเคชั่น";
 $lang['app_ov_confirm_del_app'] = "คุณต้องการลบแอพพลิเคชั่นนี้หรือไม่?";
 // app_premanage
 $lang['app_prema_app_management'] = "การจัดการแอพพลิเคชั่น";
 $lang['app_prema_add_new_app'] = "เพิ่มแอพพลิเคชั่นใหม่";
 $lang['app_prema_id'] = "ไอดี";
 $lang['app_prema_action'] = "การทำงาน";
 $lang['app_prema_app_manage'] = "จัดการแอพพลิเคชั่น";
 $lang['app_prema_app_name'] = "ชื่อแอพพลิเคชั่น :";
 $lang['app_prema_app_token'] = "แอพพลิเคชั่น Token :";
 $lang['app_prema_gen_token'] = "สร้าง Token";
 $lang['app_prema_app_lang'] = "ชนิดภาษา :";
 $lang['app_prema_agent_contro'] = "ตัวควบคุม Agent :";
 $lang['app_prema_enable'] = "เปิด";
 $lang['app_prema_disable'] = "ปิด";
 $lang['app_prema_cancel'] = "ยกเลิก";
 $lang['app_prema_save'] = "บันทึก";
 $lang['app_prema_are_you_sure_del_app'] = "คุณต้องการลบแอพพลิเคชั่นหรือไม่?";
 $lang['app_prema_pls_enter_app_name'] = "กรุณากรอกชื่อแอพพลิเคชั่นของคุณ";
 $lang['app_prema_pls_enter_app_token'] = "กุณากดปุ่มสร้าง application token ของคุณ";
 $lang['app_prema_pls_enter_app_lang'] = "กรุณากรอชนิดภาษาแอพพลิเคชั่นของคุณ";
  // app_reportdetail
 $lang['app_report_app_log_report'] = "รายงานล็อคของแอพพลิเคชั่น";
 $lang['app_report_log_report'] = "รายงานล็อค";
 $lang['app_report_report_setting'] = "ตั้งค่ารายงาน";
 $lang['app_report_date_time_range'] = "เลือกช่วงวันเวลา";
 $lang['app_report_all_app'] = "แอพพลิเคชั่นทั้งหมด";
 $lang['app_report_show'] = "แสดง";
 $lang['app_report_gen_report'] = "สร้างรายงาน";
 $lang['app_report_report_data'] = "ข้อมูลรายงาน";
 $lang['app_report_date'] = "วันที่";
 $lang['app_report_time'] = "เวลา";
 $lang['app_report_type'] = "ประเภท";
 $lang['app_report_func'] = "ฟังก์ชัน";
 $lang['app_report_message'] = "รายละเอียด";

 /**
  * Function
  */
 // func_preoverview
 $lang['func_preover_app_func_over'] = "ภาพรวมของแอพพลิเคชั่นฟังก์ชัน";
 $lang['func_preover_app_func'] = "แอพพลิเคชั่น ฟังก์ชัน";
 $lang['func_preover_id'] = "ไอดี";
 $lang['func_preover_func'] = "ฟังก์ชัน";
 $lang['func_preover_action'] = "การทำงาน";
 // func_overview
 $lang['func_over_over_of'] = "ภาพรวมของ ";
 $lang['func_over_app_func'] = "แอพพลิเคชั่น ฟังก์ชัน";
 $lang['func_over_dis_set'] = "ตั้งค่าการแสดง";
 $lang['func_over_date'] = "วันที่:";
 $lang['func_over_quick_menu'] = "เมนูลัด";
 $lang['func_over_agent_set'] = "ตั้งค่า Agent";
 $lang['func_over_report'] = "สร้างรายงาน";
 $lang['func_over_edit_func'] = "แก้ไขฟังก์ชัน";
 $lang['func_over_remove_func'] = "ลบฟังก์ชัน";
 $lang['func_over_app_token :'] = "แอพพลิเคชั่น Token :";
 $lang['func_over_func_token :'] = "ฟังก์ชัน Token :";
 $lang['func_over_close'] = "ปิด";
 $lang['func_over_func_sum_stat'] = "ข้อมูลสรุปของฟังก์ชันเชิงสถิติ";
 $lang['func_over_day'] = "วัน";
 $lang['func_over_month'] = "เดือน";
 $lang['func_over_year'] = "ปี";
 $lang['func_over_func_used_stat'] = "ฟังก์ชันที่ใช้ข้อมูลเชิงสถิติ";
 $lang['func_over_func_sum_ratio'] = "ข้อมูลสรุปของฟังก์ชันเชิงอัตราส่วน";
 $lang['func_over_total_func'] = "ฟังก์ชันทั้งหมดของ";
 $lang['func_over_log_in_day'] = "ที่เก็บล็อครายวัน";
 $lang['func_over_log_in_month'] = "ที่เก็บล็อครายเดือน";
 $lang['func_over_log_in_year'] = "ที่เก็บล็อครายปี";
 $lang['func_over_use_in_day'] = "ที่ถูกใช้รายวัน";
 $lang['func_over_use_in_month'] = "ที่ถูกใช้รายเดือน";
 $lang['func_over_use_in_year'] = "ที่ถูกใช้รายปี";
 $lang['func_over_ratio_log_type_in_func'] = "อัตราส่วนของการเก็บล็อคแต่ละประเภทในฟังก์ชัน";
 //func_reportdetail
 $lang['func_rep_app_func_log_rep'] = "รายงานล็อคของฟังก์ชัน";
 $lang['func_rep_app_func'] = "แอพพลิเคชั่น ฟังก์ชัน";
 $lang['func_rep_log_rep'] = "สร้างรายงาน";
 $lang['func_rep_rep_set'] = "ตั้งค่ารายงาน";
 $lang['func_rep_date_and_time_range'] = "เลือกช่วงวันเวลา";
 $lang['func_rep_func'] = "ฟังก์ชัน";
 $lang['func_rep_all_func'] = "ฟังก์ชันทั้งหมด";
 $lang['func_rep_show'] = "แสดง";
 $lang['func_rep_gen_rep'] = "สร้างรายงาน";
 $lang['func_rep_rep_data'] = "ข้อมูลรายงาน";
 $lang['func_rep_date'] = "วันที่";
 $lang['func_rep_time'] = "เวลา";
 $lang['func_rep_type'] = "ประเภท";
 $lang['func_rep_func'] = "ฟังก์ชัน";
 $lang['func_rep_message'] = "รายละเอียด";
 //func_prema_nage
 $lang['func_prema_app_func_mana'] = "การจัดการแอพพลิเคชั่นส่วนของฟังก์ชัน";
 $lang['func_prema_app_func'] = "แอพพลิเคชั่น ฟังก์ชัน";
 $lang['func_prema_add_new_func'] = "เพิ่มฟังก์ชันใหม่";
 $lang['func_prema_id'] = "ไอดี";
 $lang['func_prema_func'] = "ฟังก์ชัน";
 $lang['func_prema_action'] = "การทำงาน";
 $lang['func_prema_func_manage'] = "จัดการฟังก์ชัน";
 $lang['func_prema_func_name :'] = "ชื่อฟังก์ชัน :";
 $lang['func_prema_func_token'] = "ฟังก์ชัน Token :";
 $lang['func_prema_app'] = "แอพพลิเคชั่น :";
 $lang['func_prema_select'] = "----- เลือก -----";
 $lang['func_prema_pri_func'] = "ฟังก์ชันหลัก :";
 $lang['func_prema_yes'] = "ใช่";
 $lang['func_prema_no'] = "ไม่";
 $lang['func_prema_cancel'] = "ยกเลิก";
 $lang['func_prema_save'] = "บันทึก";

  /**
  * User list
  */
 $lang['user_list_user_manage'] = "การจัดการผู้ใช้งาน";
 $lang['user_list_add_new_user'] = "เพิ่มผู้ใช้งานใหม่";
 $lang['user_list_id'] = "ไอดี";
 $lang['user_list_user'] = "ชื้อผู้ใช้งาน";
 $lang['user_list_fname'] = "ชื่อ";
 $lang['user_list_lname'] = "นามสกุล";
 $lang['user_list_action'] = "การทำงาน";
 $lang['user_list_username'] = "ชื้อผู้ใช้งาน :";
 $lang['user_list_passwd'] = "รหัสผ่าน :";
 $lang['user_list_con_passwd'] = "ยืนยันรหัสผ่าน :";
 $lang['user_list_frist_name'] = "ชื่อ :";
 $lang['user_list_last_name'] = "นามสกุล :";
 $lang['user_list_email'] = "อีเมล :";
 $lang['user_list_cancel'] = "ยกเลิก";
 $lang['user_list_save'] = "บันทึก";

 /**
  * PDF Template 
  */
 $lang['pdf_tem_samf_monitor_rep'] = "SAMF Monitor Report";
 $lang['pdf_tem_date'] = "วันที่";
 $lang['pdf_tem_time'] = "เวลา";
 $lang['pdf_tem_type'] = "ประเภท";
 $lang['pdf_tem_func'] = "ฟังก์ชัน";
 $lang['pdf_tem_message'] = "รายละเอียด";
 $lang['pdf_tem_gener_by_samf'] = "Generated by SAMF";

 /**
  * API
  */
 $lang['api_api_management'] = "การจัดการ API";
 $lang['api_api'] = "API";
 $lang['api_manage'] = "การจัดการ";
 $lang['api_add_new_api_key'] = "เพิ่ม API Key ใหม่";
 $lang['api_api_key_for_3rd'] = "API key สำหรับ 3rd party แอพพลิเคชั่น";
 $lang['api_id'] = "ID";
 $lang['api_app_name'] = "ชื่อแอพพลิเคชั่น (ชื่อของ API Key)";
 $lang['api_action'] = "การทำงาน";
 $lang['api_api_manage'] = "จัดการ API";
 $lang['api_app_name'] = "ชื่อแอพพลิเคชั่น :";
 $lang['api_api_key_token'] = "API Key Token :";
 $lang['api_gen_token'] = "สร้าง Token";
 $lang['api_api_enable :'] = "เปิดการทำงาน API :";
 $lang['api_enable'] = "เปิดการทำงาน";
 $lang['api_disable'] = "ปิดการทำงาน";
 $lang['api_cancel'] = "ยกเลิก";
 $lang['api_save'] = "บันทึก";

 /**
  * Setting
  */
 $lang['setting_set'] = "ตั้งค่า";
 $lang['setting_set_your_sys'] = "ตั้งค่าระบบของคุณ";

 
 ?>