<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BadrShop extends Model
{
    use HasFactory;
    protected $table="badr_shop";
    protected $fillable = [
        'shop_name',
        'telephone',
        'owner_name',
        'sarial_id',
        'active_id',
        'active_date',
        'tel_bill',
        'mobile_bill',
        'bill_header',
        'message_bill',
        'run_date',
        'run_domain',
        'logo_path',
        'color_option',
        'edit_incom_price',
        'sale_quick',
        'enter_quant',
        'return_bill',
        'sale_details',
        'sale_details_safe',
        'items_company',
        'alert_due_date',
        'company_ratio',
        'units_sup',
        'bolla',
        'boll_per',
        'bolla_gift',
        'bill_size',
        'billno_show',
        'bill_no_record',
        'barcode_size',
        'barcode_reader',
        'day_payment',
        'type_name',
        'type_show_barcode',
        'price_percent',
        'discount_type',
        'edit_price_bill',
        'spend_at_report',
        'incom_at_report',
        'currency',
        'money_safe',
        'network_payment',
        'plan',
        'themo_store',
        'install_path',
        'server_path',
        'us_os',
        'pass_os',
        'date_type',
        'huro_late',
        'zone',
        'vs',
        'online',
        'module',
        'u_no',
        'notify',
        'multi_price',
        'check_lowest_price',
        'notes',
        'auto_print',
        'bill_time_alert',
        'style',
        'color_size',
        'badr_style',
        'language',
        'about',
        'email',
        'bill_adds',
        'upload_img',
        'decimal_num_quant',
        'decimal_num_price',
        'select_client',
        'client_limit',
        'insatllments',
        'screen_type',
        'country',
        'backup_time',
        'backup_path',
        'manufacturing',
        'distributer',
        'sms_scrip',
        'show_item_serial',
        'upload_img_slide',
        'address',
        'Regist_purchases',
        'remain_transaction',
        'points_granted',
        'amount',
        'income_saleprice',
        'show_expire_date',
        'expire_notification',
        'POS',
        'ecomme',
        'bell_flag',
        'bell_date',
        'req_mandob',
        'new_req_bill_status',
        'mandob_bill',
        'incom_total_filed',
        'auto_barcode',
        'start_barcode',
        'client_debenture',
        'paypal_client_id',
        'paypal_client_secret',
        'base_url',
        'offer_cats',
        'trans_price',
        'Enter_payment',
        'show_imag',
        'add_rest',
        'pay_price_update',
        'Profits_Calc_method',
        'client_last_saleprice',
        'show_cat_imag',
        'export',
        'spends_incomes',
        'fee_bill',
        'fee_type',
        'bill_lang',
        'client_code',
        'english_shop_name',
        'back_sales',
        'shop_terms',
        'multi_currency',
        'identity_numbers',
        'item_factory',
        'discount_without_vat',
        'discount_vat',
        'watermark_use',
        'watermark_path',
        'visitors_page',
        'tables_management',
        'add_cities',
        'bill_services',
        'delivery_man',
        'quick_item_edit',
        'item_code',
        'send_bill_sms',
        'generate_qr',
        'advanced_car_care',
        'check_serial_exist',
        'discount_cards',
        'item_print_ticket',
        'clients_group',
        'junk_bill',
        'confirm_store_transfer',
        'repeat_client_name',
        'firm_vat_no',
        'wash_print_ticket',
        'prevent_edits',
        'trade_number',
        'shipping_fee',
        'driver_info',
        'no_bill_type',
        'coupon',
        'purchase_screen_type',
        'show_sales_points_sales',
        'maintenance_module',
        'commission_type',
        'einvoice',
        'submit_einvoice',
        'negative_money',
    ];

    public function sliders()
    {
        return $this->hasMany(Slider::class);
    }
    public function scopeSelection($query)
    {
        return $query->select( 'about','shop_terms',);
    }
}
