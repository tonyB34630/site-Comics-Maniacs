<?php

namespace Hurrytimer;

use Hurrytimer\Dependencies\Carbon\Carbon;
use Hurrytimer\Dependencies\Carbon\CarbonPeriod;
use Hurrytimer\Utils\Helpers;

class Campaign
{

    /**
     * Campaign custom post ID
     *
     * @var int
     */
    private $id;

    /**
     * Campaign mode.
     *
     * @see C.php
     *
     * @var int
     */
    public $mode = C::MODE_REGULAR;

    /**
     * Evergreen duration array.
     *
     * @see getDuration()
     *
     * @var array
     */
    public $duration;

    /**
     * Recurrence duration
     *
     * @var int
     */
    public $recurringDuration;

    /**
     * Recurrence start date/time
     *
     * @var string
     */
    public $recurringStartTime;

    /**
     * Recurrence end option
     *
     * @var int
     */
    public $recurringEnd = C::RECURRING_END_NEVER;

    /**
     * Recurrence frequency
     *
     * @see C
     * @var string
     */
    public $recurringFrequency = C::RECURRING_DAILY;

    /**
     * Recurrence interval
     *
     * @var int
     */
    public $recurringInterval = 1;

    /**
     * Recurrence count
     *
     * @var int
     */
    public $recurringCount = 2;

    /**
     * Recurrence end date/time
     *
     * @var
     */
    public $recurringUntil;

    /**
     * Recurrence allowed days
     *
     * @var array
     */
    public $recurringDays = [ 0, 1, 2, 3, 4, 5, 6 ];

    /**
     * Restart option after expiration.
     *
     * @see \Hurrytimer\CampaignRestart
     *
     * @var int
     */
    public $restart;
    public $restartDuration = ['days'=> 0, 'hours'=> 0, 'minutes'=> 0, 'seconds'=> 0];

    /**
     * Headline text.
     *
     * @var string
     */
    public $headline = "Hurry Up!";

    /**
     * Headline color.
     *
     * @var string
     */
    public $headlineColor = "#000";

    /**
     * Headline size.
     *
     * @var int
     */
    public $headlineSize = 30;

    /**
     * Headline position.
     *
     * @var int
     */
    public $headlinePosition = C::HEADLINE_POSITION_ABOVE_TIMER;

    /**
     * Headline visibility.
     *
     * @var boolean
     */
    public $headlineVisibility = C::YES;

    public $headlineSpacing = 5;

    /**
     * Control labels visibility.
     *
     * @var string
     */
    public $labelVisibility = C::YES;

    /**
     * Show/hide days block.
     *
     * @var string
     */
    public $daysVisibility = C::YES;

    public $monthsVisibility = C::NO;

    /**
     * Show/hide hours block.
     *
     * @var string
     */
    public $hoursVisibility = C::YES;

    /**
     * Show/hide minutes block.
     *
     * @var string
     */
    public $minutesVisibility = C::YES;

    /**
     * Show/hide seconds block.
     *
     * @var string
     */
    public $secondsVisibility = C::YES;

    /**
     * Regular campaign end date/time.
     *
     * @var string
     */
    public $endDatetime;

    /**
     * Labels texts.
     *
     * @var array
     */
    public $labels
        = [
            'months'  => 'months',
            'days'    => 'days',
            'hours'   => 'hrs',
            'minutes' => 'mins',
            'seconds' => 'secs',
        ];

    /**
     * Digit color.
     *
     * @var string
     */
    public $digitColor = "#000";

    /**
     * Digit size.
     *
     * @var int
     */
    public $digitSize = 35;

    /**
     * Redirect action url.
     *
     * @var string
     */
    public $redirectUrl;

    /**
     * Label size.
     *
     * @var int
     */
    public $labelSize = 12;

    /**
     * Label color.
     *
     * @var string
     */
    public $labelColor = "#000";

    /**
     * End action.
     *
     * @var array
     */
    public $actions = [];

    /**
     * WooCommerce compaign position in product page.
     *
     * @var int
     */
    public $wcPosition = C::WC_POSITION_ABOVE_TITLE;

    /**
     * Enable/disable woocommerce integration.
     *
     * @var string
     */
    public $wcEnable = C::NO;

    /**
     * WooCommerce products selection.
     *
     * @var array
     */
    public $wcProductsSelection;

    /**
     * WooCommerce products selection type.
     *
     * @var int
     */
    public $wcProductsSelectionType;

    /**
     * WooCommerce conditions.
     * @var array $wcConditions
     */
    public $wcConditions;

    /**
     * Timer block border color.
     *
     * @var string
     */
    public $blockBorderColor = "";

    /**
     * Timer Block border width.
     *
     * @var int
     */

    public $blockBorderWidth = 0;

    /**
     * Timer block radius.
     *
     * @var int
     */
    public $blockBorderRadius = 0;

    /**
     * Block size.
     *
     * @var int
     */

    public $blockSize = 50;

    /**
     * Block background color.
     *
     * @var string
     */
    public $blockBgColor = '';

    /**
     * Block spacing.
     *
     * @var int
     */
    public $blockSpacing = 5;

    /**
     * Block padding.
     *
     * @var int
     */
    public $blockPadding = 0;

    /**
     * Block spearator visibility.
     *
     * @var boolean
     */
    public $blockSeparatorVisibility = C::YES;

    /**
     * Label case
     *
     * @var string
     */
    public $labelCase = C::TRANSFORM_UPPERCASE;

    /**
     * Custom CSS
     *
     * @var string
     */
    public $customCss = '';

    /**
     * Block elements display
     * Values: block, inline
     *
     * @var string
     */
    public $blockDisplay = 'block';

    /**
     * Enable sticky bar.
     */
    public $enableSticky = C::NO;

    /**
     * Sticky bar background color.
     *
     * @var string
     */
    public $stickyBarBgColor = '#eee';

    /**
     * Sticky bar close button color.
     *
     * @var string
     */
    public $stickyBarCloseBtnColor = '#fff';

    /**
     * Sticky bar position.
     * Values: top, bottom
     *
     * @var string
     */
    public $stickyBarPosition = 'top';

    /**
     * Sticky bar padding.
     *
     * @var integer
     */
    public $stickyBarPadding = 5;

    /**
     * Sticky bar display pages.
     *
     * @var array
     */
    public $stickyBarPages = [];
    public $stickyIncludeUrls = [];
    public $stickyExcludeUrls = [];

    /**
     * Sticky exclude pages.
     *
     * @var array
     */
    public $stickyExcludePages = [];

    /**
     * Where to display the sticky bar option
     *
     * @var string
     */
    public $stickyBarDisplayOn = 'all_pages';

    /**
     * Show sticky bar close button?
     *
     * @var string
     */
    public $stickyBarDismissible = C::YES;


    /**
     * If dismissed, re-open sticky bar after x days.
     * @var int
     */
    public $stickyBarDismissTimeout = 7;

    /**
     * CTA settings.
     *
     * @var array
     */
    public $callToAction
        = [
            'enabled'       => C::NO,
            'new_tab'       => C::NO,
            'url'           => '',
            'text'          => 'Learn More',
            'text_size'     => 15,
            'text_color'    => '#fff',
            'bg_color'      => '#000',
            'y_padding'     => 10,
            'x_padding'     => 15,
            'border_radius' => 3,
            'spacing'       => 5,

        ];

    /**
     * Campaign elements display
     * values: block,inline
     *
     * @var string
     */
    public $campaignDisplay = 'block';

    /**
     * Campaign aligments
     * values: center,left,right
     *
     * @var string
     */
    public $campaignAlign = 'center';

    /**
     * Campaign spacing.
     *
     * @var integer
     */
    public $campaignSpacing = 10;

    /**
     * Campaign horizontal padding.
     *
     * @var integer
     */
    public $campaignXPadding = 10;

    /**
     * Campaign vertical padding.
     *
     * @var integer
     */
    public $campaignYPadding = 10;

    /**
     * Force evergreen timer to reset on reload.
     */
    public $reloadReset = false;


    /**
     *
     */

    public $detectionMethods = [
        C::DETECTION_METHOD_COOKIE,
        C::DETECTION_METHOD_IP,
    ];


    public $recurringMonthlyDayType = C::RECURRING_MONTHLY_DAY_OF_MONTH;

    public function __construct( $id )
    {
        $this->recurringStartTime = Carbon::now( hurryt_tz() )->format( 'Y-m-d h:i A' );
        $this->id                 = $id;
    }

    /**
     * Returns compaign post iD.
     *
     * @return int
     */
    public function get_id()
    {
        return $this->id;
    }


    /**
     * Returns true if the current sticky bar can be displayed on the given page.
     *
     * @param $pageId
     *
     * @return bool
     * @throws \Exception
     */
    public function show_sticky_on_page( $pageId )
    {
        if ( $this->enableSticky === C::NO ) {
            return true;
        }

        switch ( $this->getStickyBarDisplayOn() ) :

            case 'wc_products_pages':
                if ( !empty( $pageId ) && function_exists( 'is_product' ) && is_product() ) {

                    $wc_campaign = new WCCampaign();
                    if ( ( $wc_campaign->has_campaign( $this, $pageId ) )
                        && $wc_campaign->met_conditions( $this, $pageId ) ) {
                        return apply_filters( 'hurryt_show_sticky_bar', true, $this->get_id() );
                    }

                }

                return apply_filters( 'hurryt_show_sticky_bar', false, $this->get_id() );

            case 'specific_pages':
                $pageIds = $this->getStickyBarPages();

                if ( !empty( $pageId ) && !empty( $pageIds ) && in_array( $pageId, $pageIds, true ) ) {
                    return apply_filters( 'hurryt_show_sticky_bar', true, $this->get_id() );
                }

                foreach ( $this->stickyIncludeUrls as $url ) {
                    $current_url = isset( $_SERVER[ 'REQUEST_URI' ] ) ? $_SERVER[ 'REQUEST_URI' ] : '/';
                    if ( Helpers::stripUrlHost( $url ) === Helpers::stripUrlHost( $current_url ) ) {
                        return apply_filters( 'hurryt_show_sticky_bar', true, $this->get_id() );
                        break;
                    }
                }
                return apply_filters( 'hurryt_show_sticky_bar', false, $this->get_id() );
            case 'exclude_pages':
                $pageIds = $this->getStickyExcludePages();

                if ( !empty( $pageId ) && !empty( $pageIds ) && in_array( $pageId, $pageIds, true ) ) {
                    return apply_filters( 'hurryt_show_sticky_bar', false, $this->get_id() );
                }

                foreach ( $this->stickyExcludeUrls as $url ) {
                    $current_url = isset( $_SERVER[ 'REQUEST_URI' ] ) ? $_SERVER[ 'REQUEST_URI' ] : '/';
                    if ( Helpers::stripUrlHost( $url ) === Helpers::stripUrlHost( $current_url ) ) {
                        return apply_filters( 'hurryt_show_sticky_bar', false, $this->get_id() );
                        break;
                    }
                }

                return apply_filters( 'hurryt_show_sticky_bar', true, $this->get_id() );
            case 'all_pages':
                return apply_filters( 'hurryt_show_sticky_bar', true, $this->get_id() );
            default:
                return apply_filters( 'hurryt_show_sticky_bar', false, $this->get_id() );
        endswitch;


    }

    /**
     * Returns sticky bar pages.
     *
     * @return array
     */
    public function getStickyBarPages()
    {
        $pagesIds = $this->get_prop( 'sticky_bar_pages' );

        return array_filter( array_map( 'intval', $pagesIds ) );
    }

    public function getStickyExcludePages()
    {
        $page_ids = $this->get_prop( 'sticky_exclude_pages' );

        return array_filter( array_map( 'intval', $page_ids ) );
    }

    /**
     * Set sticky bar pages.
     *
     * @param $value
     */
    public function setStickyBarPages( $value )
    {
        $this->set_prop( 'sticky_bar_pages', $value );
    }

    public function setStickyExcludePages( $value )
    {
        $this->set_prop( 'sticky_exclude_pages', $value );
    }

    public function setStickyBarDismissTimeout( $value )
    {
        $this->set_prop( 'sticky_bar_dismiss_timeout', intval( $value ) );
    }

    public function getStickyBarDismissTimeout()
    {
        return intval( $this->get_prop( 'sticky_bar_dismiss_timeout' ) );
    }

    public function getStickyBarDisplayOn()
    {

        // backward compat.
        $all_pages = $this->get_prop( 'sticky_bar_show_on_all_pages', false );

        if ( $all_pages === C::YES ) {
            $this->setStickyBarDisplayOn( 'all_pages' );
        }

        $this->delete_prop( 'sticky_bar_show_on_all_pages' );

        $value = $this->get_prop( '_hurryt_sticky_bar_display_on', false );

        return !empty( $value ) ? $value : $this->stickyBarDisplayOn;
    }

    public function setStickyBarDisplayOn( $value )
    {
        $this->set_prop( '_hurryt_sticky_bar_display_on', $value );
    }

    /**
     * Get raw setting.
     *
     * @param string $name
     * @param boolean
     *
     * @return mixed
     */
    public function get_prop( $name, $useDefault = true )
    {

        $value = get_post_meta( $this->id, $name, true );
        if ( !empty( $value ) ) {
            return $value;
        }
        if ( $useDefault ) {
            $name = str_replace( '_hurryt_', '', $name );
            return $this->{Helpers::snakeToCamelCase( $name )};
        }

        return $value;
    }

    public function set_prop( $name, $value )
    {
        $value        = !empty( $value ) ? $value : '';
        $_name        = str_replace( '_hurryt_', '', $name );
        $getterMethod = Helpers::snakeToCamelCase( $_name );
        if ( empty( $value ) && method_exists( $this, $getterMethod ) ) {
            $value = $this->{$getterMethod}();
        }

        update_post_meta( $this->id, $name, $value );
    }

    /**
     * Bulk save for compaign settings.
     *
     * @param $data
     */
    public function storeSettings( $data )
    {
        foreach ( $data as $prop => $value ) {
            $method = Helpers::snakeToCamelCase( "set_{$prop}" );
            if ( method_exists( $this, $method ) ) {
                $this->$method( $value ?: $this->$prop );
            } elseif ( property_exists( __CLASS__, Helpers::snakeToCamelCase( $prop ) ) ) {
                $this->set_prop( $prop, $value );
            }
        }
        if ( !isset( $data[ 'wc_conditions' ] ) ) {
            $this->setWcConditions( [] );
        }
        if ( !isset( $data[ 'sticky_bar_pages' ] ) ) {
            $this->setStickyBarPages( [] );
        }

        CSS_Builder::get_instance()->build();
    }

    //removeIf(pro)

    /**
     * @param int $mode
     * ::PROP
     */
    public function setMode( $mode )
    {
        if ( $mode == C::MODE_RECURRING ) {
            return;
        }
        $this->set_prop( 'mode', $mode );
    }
    //endRemoveIf(pro)

    /**
     * TODO: Settings should load automatically upon instance creation.
     */
    public function loadSettings()
    {

        $reflection = new \ReflectionObject( $this );
        // TODO: Refactor prop loading to `$this->get_{prop}()`
        foreach ( $reflection->getProperties( \ReflectionProperty::IS_PUBLIC ) as $prop ) {
            $name   = $prop->getName();
            $method = 'get' . ucfirst( $name );
            if ( method_exists( $this, $method ) ) {
                $this->{$name} = $this->$method();
            } else {
                $this->{$name} = $this->get_prop( Helpers::camelToSnakeCase( $name ) );
            }
        }


    }


    public function getHeadline()
    {
        if ( empty( $this->id ) ) {
            return $this->headline;
        }
        if ( metadata_exists( 'post', $this->id, '_hurryt_headline' ) ) {
            return $this->get_prop( '_hurryt_headline' );
        }

        return get_the_title( $this->id );
    }

    public function setHeadline( $value )
    {
        $this->set_prop( '_hurryt_headline', $value );
    }

    public function is_published()
    {
        return get_post_status( $this->id ) === "publish";
    }

    /**
     * Check if WooCommerce is enabled for this campaign.
     *
     * @return bool
     */
    public function is_wc_enabled()
    {
        return $this->getWcEnable() === C::YES;
    }

    /**
     * Check current countdown timer mode
     * ::PROP
     *
     * @return bool
     */
    public function is_evergreen()
    {
        return $this->get_prop( 'mode' ) == C::MODE_EVERGREEN;
    }

    public function is_one_time()
    {
        return $this->get_prop( 'mode' ) == C::MODE_REGULAR;
    }

    public function is_recurring()
    {
        return $this->get_prop( 'mode' ) == C::MODE_RECURRING;

    }

    /**
     * Save compaign endtime for regular mode.
     *
     * @param $date
     */
    public function setEndDatetime( $date )
    {
        $this->set_prop( 'end_datetime', $date ?: $this->defaultEndDatetime() );
    }

    /**
     * Returns default end datetime for regular mode.
     * ::PROP
     *
     * @return false|string
     */
    private function defaultEndDatetime()
    {
        return date( 'Y-m-d h:i A', strtotime( '+1 week' ) );
    }

    /**
     * Save digit color.
     * ::PROP
     *
     * @param $color
     */
    public function setDigitColor( $color )
    {
        $this->set_prop( 'digit_color', $color );
    }

    /**
     * Returns headline visibility.
     * ::PROP
     *
     * @return mixed
     */

    public function getHeadlineVisibility()
    {
        $meta = 'headline_visibility';

        $value = $this->get_prop( $meta, false );
        if ( $value === C::NO || $value === C::YES ) {
            return $value;
        }

        $legacyMeta  = 'display_headline';
        $legacyValue = filter_var( $this->get_prop_legacy( $legacyMeta ),
            FILTER_VALIDATE_BOOLEAN );
        $legacyValue = $legacyValue ? C::YES : C::NO;

        $this->set_prop( $meta, $legacyValue );

        $this->delete_prop( $legacyMeta );

        return $this->get_prop( $meta );
    }

    /**
     * Returns digit color.
     * Backward compat with older versions.
     * ::PROP
     *
     * @return mixed
     */
    public function getDigitColor()
    {
        $value = $this->get_prop( 'digit_color', false );
        if ( $value ) {
            return $value;
        }

        $legacy = $this->get_prop_legacy( 'text_color' );
        if ( !$legacy ) {
            return $this->digitColor;
        }

        $this->setDigitColor( $legacy );
        if ( !$this->get_prop( 'label_color', false ) ) {
            $this->setLabelColor( $legacy );
        }

        $this->delete_prop( 'text_color' );

        return $this->get_prop( 'digit_color' );
    }

    /**
     * ::PROP
     *
     * @param $color
     */
    public function setLabelColor( $color )
    {
        $this->set_prop( 'label_color', $color );
    }

    /**
     * Get label color
     * ::PROP
     *
     * @return mixed
     */
    public function getLabelColor()
    {
        $value = $this->get_prop( 'label_color', false );
        if ( $value ) {
            return $value;
        }

        $legacy = $this->get_prop_legacy( 'text_color' );
        if ( !$legacy ) {
            return $this->labelColor;
        }

        $this->setLabelColor( $legacy );
        if ( !$this->get_prop( 'digit_color', false ) ) {
            $this->setDigitColor( $legacy );
        }

        $this->delete_prop( 'text_color' );

        return $this->get_prop( 'label_color' );

    }

    /**
     *
     * Return timer digit size.
     * Backward comapt. with older versions.
     * ::PROP
     *
     * @return int
     * @since 1.2.4
     */
    public function getDigitSize()
    {
        $meta  = 'digit_size';
        $value = $this->get_prop( $meta, false );
        if ( !empty( $value ) ) {
            return $value;
        }
        $legacy = $this->get_prop_legacy( 'text_size' );

        if ( empty( $legacy ) ) {
            return $this->digitSize;
        }

        $this->setDigitSize( $legacy );

        $this->delete_prop( 'text_size' );

        return $this->get_prop( 'digit_size' );
    }

    /**
     * Save timer digit size.
     * ::PROP
     *
     * @param $size
     */
    public function setDigitSize( $size )
    {
        $this->set_prop( 'digit_size', $size );
    }

    /**
     * Save timer label size.
     * ::PROP
     *
     * @param $size
     */
    public function setLabelSize( $size )
    {
        $this->set_prop( 'label_size', $size );
    }


    /**
     * ::PROP
     *
     * @param $size
     */
    public function setHeadlineSize( $size )
    {
        $this->set_prop( 'headline_size', $size );
    }

    /**
     * Returns evergreen duration.
     * ::PROP
     *
     * @return array
     */
    public function getDuration()
    {
        $duration = (array)$this->get_prop( 'duration' );
        return array_pad( array_map( 'intval', $duration ), 4, 0 );
    }


    public function getRestartDuration($asSeconds = false )
    {
       $duration = (array)$this->get_prop( 'hurryt_restart_duration', false );

       $duration = wp_parse_args($duration, $this->restartDuration);
       foreach($duration as $unit => $value){
           $duration[$unit] = (int)$value;
       }

       if($asSeconds){
        $duration = $duration['days'] * DAY_IN_SECONDS +
        $duration['hours'] * HOUR_IN_SECONDS +
        $duration['minutes'] * MINUTE_IN_SECONDS +
        $duration['seconds'];
       }
       return $duration;
    }

    public function setRestartDuration($duration_array){
        $this->set_prop( 'hurryt_restart_duration', $duration_array );
    }
    /**
     * ::PROP
     *
     * @param $value
     */
    public function setRecurringDuration( $value )
    {
        $this->set_prop( '_hurryt_recurring_duration', $value );
    }


    /**
     * Returns evergreen duration.
     *
     * @return array
     */
    public function getRecurringDuration()
    {

        $duration = (array)$this->get_prop( '_hurryt_recurring_duration', false );
        return array_pad( array_map( 'intval', $duration ), 4, 0 );
    }

    /**
     * Returns actions array.
     *
     * @return array
     */
    public function getActions()
    {
        $legacy = $this->get_prop_legacy( 'end_action' );
        if ( $legacy ) {
            $redirectUrl = $this->get_prop_legacy( 'redirect_url' );
            $actions     = [
                [
                    'id'          => intval( $legacy ),
                    'redirectUrl' => $redirectUrl,
                ],
            ];
            $this->set_prop( 'actions', $actions );
            $this->delete_prop( 'end_action' );
            $this->delete_prop( 'redirect_url' );

            return $this->mergeActions( $actions );
        }

        return $this->mergeActions( $this->get_prop( 'actions' ) );
    }

    private function mergeActions( $actions )
    {
        $defaults = [
            [
                'id'            => C::ACTION_NONE,
                'redirectUrl'   => '',
                'message'       => '',
                'coupon'        => '',
                'wcStockStatus' => '',
            ],
        ];

        if ( count( $actions ) === 0 ) {
            return $defaults;
        }

        return array_map( function ( $action ) use ( $defaults ) {
            $action[ 'id' ] = (int)$action[ 'id' ];

            $action[ 'message' ] = preg_replace_callback('#<style(\s=?[\S]*)?>([\s\S]*)?<\/style>#', function($matches){
                return '<style' . $matches[1] . '>'. preg_replace('/\<br(\s*)?\/?\>/i', '', $matches[2]) . '</style>';
                }, $action['message']);
            
            return array_merge( $defaults[ 0 ], $action );
        }, $actions );
    }


    public function get_action( $needle )
    {
        $result = array_filter( $this->actions, function ( $action ) use ( $needle ) {
            return $needle === (int)$action[ 'id' ];
        } );

        if ( empty( $result ) ) {
            return false;
        }

        return array_shift( $result );
    }

    /**
     * Returns evergreen duration in seconds.
     *
     * @param array $duration
     *
     * @return int
     */
    public function durationInSeconds( $duration = [] )
    {
        list( $d, $h, $m, $s ) = empty( $duration ) ? $this->getDuration() : $duration;

        return
            $d * DAY_IN_SECONDS +
            $h * HOUR_IN_SECONDS +
            $m * MINUTE_IN_SECONDS +
            $s;
    }

    /**
     * Returns end datetime.
     *
     * @return string
     */
    public function getEndDatetime()
    {
        return $this->get_prop( 'end_datetime' ) ?: $this->defaultEndDatetime();
    }

    /**
     * Return true if the recurrence is expired.
     *
     * @return bool
     */
    public function is_recurring_expired()
    {
        $endDate = $this->getRecurrenceEndDate();

        if ( !( $endDate instanceof Carbon ) ) {
            return false;
        }

        $now = Carbon::now( hurryt_tz() );

        return $now->greaterThan( $endDate );
    }

    /**
     * Calculate next recurrence.
     *
     * @return mixed
     * @throws \Exception
     */
    function timeToNextRecurrence()
    {
        $this->loadSettings();

        if( $this->isMonthlyRecurring() ){
            $current = $this->getRecurrenceEndDate();
            $next = $this->getRecurrenceEndDate( true );
            return absint($next->diffInSeconds($current));
        }
        list($duration, $pause, $period) = $this->getRecurringDurationInSeconds();
        return $pause ?: 0 ;
    }

    /**
     * Return true if the current campaign can recur today.
     *
     * @return bool
     */
    public function can_recur_today()
    {
        $this->loadSettings();

        $day   = absint( Carbon::now( hurryt_tz() )->format( 'w' ) );

        $recur = in_array( $day, array_map( 'absint', $this->recurringDays ) );

        return apply_filters( 'hurryt_recur_today', $recur, $this->get_id() );
    }

    public function isMonthlyRecurring()
    {
        return $this->recurringFrequency === C::RECURRING_MONTHLY;
    }

    public function isDayOfWeekRecurring()
    {

        return $this->recurringMonthlyDayType === C::RECURRING_MONTHLY_DAY_OF_WEEK;
    }

    public function isDayOfMonthRecurring()
    {
        return $this->recurringMonthlyDayType === C::RECURRING_MONTHLY_DAY_OF_MONTH;
    }

    public function shouldEndRecurringByDate(){
        return absint( $this->recurringEnd ) === C::RECURRING_END_TIME;
    }
    public function shouldEndRecurringByRecurrences(){
        return (int)$this->recurringEnd === C::RECURRING_END_OCCURRENCES ;
    }

    public function shouldRecurForever(){
        return (int)$this->recurringEnd === C::RECURRING_END_NEVER ;
    }

    public function getRecurringRecurrences(){
        $num = (int)$this->recurringCount;
        return ++$num;
    }

    
        public function getRecurringPeriodEndDate(){
            list( $d, $h, $m, $s ) = $this->getRecurringDuration();
            $now       = Carbon::now( hurryt_tz() );
            $startDate = Carbon::parse( $this->recurringStartTime, hurryt_tz() );
            $interval = (int)$this->recurringInterval;
            $endDate = $now->copy();

            switch($this->recurringFrequency){
                case C::RECURRING_DAILY:
                    $endDate->minute = $startDate->minute;
                    $endDate->addDays(max($interval, $d))->addHours($interval)->addMinutes($m)->addSeconds($s);
                break;
                case C::RECURRING_WEEKLY:
                    $endDate->minute = $startDate->minute;
                    $endDate->addWeeks($interval)->addHours($h)->addMinutes($m)->addSeconds($s);
                break;
                case C::RECURRING_HOURLY:
                    $endDate->minute = $startDate->minute;
                    $endDate->addHours(max($interval, $h))->addMinutes($m)->addSeconds($s); 
                break;
                case C::RECURRING_MINUTELY:
                    $minutes = max($interval, $m);
                    $endDate->addMinutes($minutes)->addSeconds($s); 
                break;
            }

            return $endDate;
        }

    public function getRecurringFrequencyInSeconds(){
        $freq = 0;
        switch($this->recurringFrequency){
            case C::RECURRING_WEEKLY:
                $freq = WEEK_IN_SECONDS;
                break;
            case C::RECURRING_DAILY:
                $freq = DAY_IN_SECONDS;
                break;
            case C::RECURRING_HOURLY:
                $freq = HOUR_IN_SECONDS;
                break;
            case C::RECURRING_MINUTELY:
                $freq = MINUTE_IN_SECONDS;
                break;
        }

        return $freq * (int)$this->recurringInterval;
    }
    /**
     * @return array [duration, pause] in seconds
     */
    public function getRecurringDurationInSeconds(){
        $duration  = $this->durationInSeconds($this->getRecurringDuration());
        $period = $this->getRecurringFrequencyInSeconds();
        $pause =   $period - $duration;
        return [$duration, max(0, $pause), $period];
    }

    public function getRecurrenceEndDate( $next = false )
    {
        try {
            $this->loadSettings();
            $now       = Carbon::now( hurryt_tz() );
            $startDate = Carbon::parse( $this->recurringStartTime, hurryt_tz() );
            $interval  = (int)$this->recurringInterval;
            
            if ( $this->isMonthlyRecurring() ) {

                $_startDate = $startDate->copy();

                if ( $startDate->day >= 28 ) { $_startDate->startOfMonth(); }

                $endDate = $now->copy()->addMonths( $interval );
              
                if ( $next ) { $endDate->addMonths( $interval ); }

                if( $this->shouldEndRecurringByDate() ){
                    $endDate = Carbon::parse( $this->recurringUntil, hurryt_tz() );
                }
                
                $period = CarbonPeriod::create( $_startDate, 'P' . $interval . 'M', $endDate );
                
                if ( $this->shouldEndRecurringByRecurrences()) {
                    $period->setRecurrences( $this->getRecurringRecurrences() );
                }
                
                if( $period->count() === 0 ){
                   return $period->getEndDate(); 
                }

                $date  = $period->first();  $i = 0;

                while ( $period->valid() ) {

                    $date       = $period->current();

                    $isOverflow = $startDate->day >= $date->daysInMonth;
                    
                    if ( $this->isDayOfMonthRecurring() && $isOverflow ) {
                        $date->endOfMonth();
                    }
                    
                    if ( $this->isDayOfWeekRecurring() ) {
                        $date->modifyWeekOfMonth( $startDate );
                    }
                    
                    $date->setTimeFrom($startDate);

                    if ( $date->greaterThan( $now ) ) {

                        if ( !$next  || $i === 1 ) {  return $date; }

                        $i++;
                    }

                    $period->next();
                }
               
                if( $this->shouldEndRecurringByDate() && $date->lessThan($now) ){
                    return $period->getEndDate();
                }

                return $date;
            } 
            
            list($duration, $pause) = $this->getRecurringDurationInSeconds();

            $period = CarbonPeriod::start( $startDate );
            
            if($pause){
                if($this->isDailyRecurring()){
                    $period->days($interval);
                }
                elseif ( $this->isWeeklyRecurring() ) {
                    $period->weeks($interval);
                } 
                elseif ( $this->isHourlyRecurring() ) {
                    $period->hours($interval);
                } 
                elseif ( $this->isMinutelyRecurring() ) {
                    $period->minutes($interval);
            }
            }else{
                $period->seconds($duration);
            }

            if($this->shouldEndRecurringByRecurrences()){
                $period->setRecurrences($this->getRecurringRecurrences());
            }else{
                $endDate = $this->getRecurringPeriodEndDate();
                $period->until($endDate);
            }

            $date = null;

            while( $period->valid() ){
                $date = $period->current();
                if( $date->greaterThan( $now ) ){
                    $date = $pause ? $date->subSeconds($pause) : $date;
                    break;
                }
                
                $period->next();
            }

           if( !$date ){
                return $period->getEndDate();
           }

           $stopDate = Carbon::parse( $this->recurringUntil, hurryt_tz() );

           if( $this->shouldEndRecurringByDate() && $stopDate->lessThan( $date ) ){
               return $stopDate;
           }

           return $date;


        } catch ( \Exception $e ) {
            return null;
        }
    }


    /**
     * Returns compaign publish datetime.
     *
     * @return mixed
     */
    public function getStartTimestamp()
    {
        return get_the_date( $this->id );
    }

    /**
     * Returns position in WooCommerce product page.
     * ::PROP
     *
     * @return mixed
     */
    public function getWcPosition()
    {
        $legacy = $this->get_prop_legacy( 'position' );

        if ( !$legacy ) {
            return $this->get_prop( 'wc_position' );
        }
        $this->set_prop( 'wc_position', $legacy );
        $this->delete_prop( 'position' );

        return $legacy;
    }

    private function get_prop_legacy( $name )
    {
        return get_post_meta( $this->id, $name, true );
    }

    /**
     * Returns true if WooCommerce integration is enabled.
     * ::PROP
     *
     * @return mixed
     */
    public function getWcEnable()
    {
        $value = $this->get_prop( 'wc_enable', false );

        if ( $value === C::YES || $value === C::NO ) {
            return $value;
        }

        $legacy = filter_var( $value, FILTER_VALIDATE_BOOLEAN );
        if ( $legacy ) {
            $this->set_prop( 'wc_enable', C::YES );
        } else {
            $this->set_prop( 'wc_enable', C::NO );
        }

        return $this->get_prop( 'wc_enable' );
    }

    /**
     * Returns true if label should be displayed.
     *
     * @return mixed
     */
    public function getLabelVisibility()
    {
        $meta  = 'label_visibility';
        $value = $this->get_prop( $meta, false );
        if ( $value === C::NO || $value === C::YES ) {
            return $value;
        }

        $legacy = filter_var( $this->get_prop_legacy( 'display_labels' ),
            FILTER_VALIDATE_BOOLEAN );
        $legacy = $legacy ? C::YES : C::NO;

        $this->set_prop( $meta, $legacy );

        $this->delete_prop( 'display_labels' );

        return $this->get_prop( $meta );

    }

    /**
     *
     * Returns restart type.
     *
     * @return int
     */
    public function getRestart()
    {
        return $this->get_prop( 'restart' ) ?: C::RESTART_NONE;
    }

    // removeIf(pro)
    public function setRestart( $value ){
        if( $value == C::RESTART_AFTER_DURATION ){
            return;
        }
        $this->set_prop('restart', $value);
    }
    // endRemoveIf(pro)
    /**
     * Returns WooCommerce products selection type.
     *
     * @return string
     */
    public function getWcProductsSelectionType()
    {
        $legacy = $this->get_prop_legacy( 'products_type' );
        if ( !$legacy ) {
            return $this->get_prop( 'wc_products_selection_type' );
        }
        $this->set_prop( 'wc_products_selection_type', $legacy );
        $this->delete_prop( 'products_type' );

        return $legacy;
    }

    /**
     * Delete setting item.
     *
     * @param $name
     */
    public function delete_prop( $name )
    {
        delete_post_meta( $this->id, $name );
    }

    /**
     * Returns products selection IDs.
     * ::PROP
     *
     * @return array
     */
    public function getWcProductsSelection()
    {
        $result = $this->get_prop_legacy( 'products' );
        if ( !$result ) {
            $result = $this->get_prop( 'wc_products_selection' );
        } else {
            $this->set_prop( 'wc_products_selection', $result );
            $this->delete_prop( 'products' );
        }

        return is_array( $result ) ? $result : [];
    }

    /**
     * Store custom labels.
     * ::PROP
     *
     * @param $labels
     */
    public function setLabels( $labels )
    {
        $labels = wp_parse_args( $labels, $this->labels );
        update_post_meta( $this->id, 'labels', $labels );
    }

    public function getLabels()
    {
        return wp_parse_args( $this->get_prop( 'labels' ), $this->labels );
    }

    /**
     * Returns true if compaign can be published.
     *
     * @return bool
     */
    public function is_active()
    {
        return get_post_status( $this->id ) === "publish"
            || get_post_status( $this->id ) === "future";

    }

    /**
     * Returns trus if the compaign is scheduled.
     *
     * @return bool
     */
    public function is_scheduled()
    {
        $scheduled = get_post_status( $this->get_id() ) === "future";
        if ( $scheduled ) {
            return true;
        }

        if ( $this->is_recurring() ) {
            $start_date = Carbon::parse( $this->recurringStartTime, hurryt_tz() );
            $now        = Carbon::now( hurryt_tz() );
            $now->second = $start_date->second;

            if ( $now->lessThan( $start_date ) ) {
                return true;
            }
        }

        return $scheduled;
    }

    /**
     * Returns true if fixed campaign datetime is expired.
     *
     * @param string|null $date
     *
     * @return bool
     */
    public function is_one_time_expired( $date = null )
    {
        $endDate = $date === null ? date_create( $this->endDatetime ) : $date;
        $today   = date_create( current_time( "mysql" ) );

        return $endDate < $today;
    }

    public function is_sticky_dismissed()
    {
        return isset( $_COOKIE[ Cookie_Detection::COOKIE_PREFIX . $this->get_id() . '_dismissed' ] )
            && $this->stickyBarDismissible === C::YES
            && $this->enableSticky === C::YES;
    }

    /**
     * Returns compaign template wrapper.
     *
     * @param string
     *
     * @return string
     */
    public function wrap_template( $content, $options = [] )
    {
        $campaignBuilder = new CampaignBuilder( $this );

        return apply_filters( 'hurryt_campaign_content', $campaignBuilder->build( $content, $options ) );
    }

    /*
     * Returns campaign template content.
     */
    public function build_template()
    {
        $campaignBuilder = new CampaignBuilder( $this );

        return $campaignBuilder->template();
    }

    /**
     * ::PROP
     *
     * @param $value
     */
    public function setWcConditions( $value )
    {
        $this->set_prop( '_hurryt_wc_conditions', !empty( $value ) ? $value : [] );
    }

    /**
     * ::PROP
     *
     * @return mixed
     */
    public function getWcConditions()
    {
        return $this->get_prop( '_hurryt_wc_conditions', false );
    }


    public function is_running()
    {
        $no = !$this->is_active()
            || $this->is_scheduled()
            || ( $this->is_recurring() && !$this->can_recur_today() )
            || ( $this->is_recurring() && $this->getRecurrenceEndDate() === null );

        return !$no;
    }

    /**
     * Check if recurring or onetime campaign is expired.
     *
     * @return bool
     */
    public function is_expired()
    {
        return ( $this->is_one_time() && $this->is_one_time_expired() )
            || ( $this->is_recurring() && $this->is_recurring_expired() );
    }

    public function get_mode_slug()
    {
        switch ( $this->mode ) {
            case C::MODE_EVERGREEN:
                return 'evergreen';
            case C::MODE_RECURRING:
                return 'recurring';
            case C::MODE_REGULAR:
                return 'one_time';
        }
    }

    public function getReloadReset()
    {
        return filter_var( $this->get_prop( 'reload_reset' ), FILTER_VALIDATE_BOOLEAN );
    }

    public function getDetectionMethods()
    {
        return array_map( 'intval', $this->get_prop( '_hurryt_detection_methods' ) );
    }

    public function setDetectionMethods( $methods )
    {
        // removeIf(pro)
        if ( is_array( $methods ) ) {
            $methods = array_filter( $methods, function ( $m ) {
                return (int)$m !== C::DETECTION_METHOD_USER_SESSION;
            } );
        }
        // endRemoveIf(pro)
        $this->set_prop( '_hurryt_detection_methods', $methods );
    }

    /**
     * @return bool
     */
    private function isDailyRecurring()
    {
        return $this->recurringFrequency === C::RECURRING_DAILY;
    }

    /**
     * @return bool
     */
    private function isWeeklyRecurring()
    {
        return $this->recurringFrequency === C::RECURRING_WEEKLY;
    }

    /**
     * @return bool
     */
    private function isHourlyRecurring()
    {
        return $this->recurringFrequency === C::RECURRING_HOURLY;
    }

    /**
     * @return bool
     */
    private function isMinutelyRecurring()
    {
        return $this->recurringFrequency === C::RECURRING_MINUTELY;
    }

}
