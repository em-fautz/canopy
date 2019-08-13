<?php
namespace GoodwishEdge\Modules\Shortcodes\Lib;

use GoodwishEdge\Modules\Shortcodes\Accordion\Accordion;
use GoodwishEdge\Modules\Shortcodes\AccordionTab\AccordionTab;
use GoodwishEdge\Modules\Shortcodes\AnimationsHolder\AnimationsHolder;
use GoodwishEdge\Modules\Shortcodes\Banner\Banner;
use GoodwishEdge\Modules\Shortcodes\Blockquote\Blockquote;
use GoodwishEdge\Modules\Shortcodes\BlogList\BlogList;
use GoodwishEdge\Modules\Shortcodes\BlogSlider\BlogSlider;
use GoodwishEdge\Modules\Shortcodes\Button\Button;
use GoodwishEdge\Modules\Shortcodes\CallToAction\CallToAction;
use GoodwishEdge\Modules\Shortcodes\Counter\Countdown;
use GoodwishEdge\Modules\Shortcodes\Counter\Counter;
use GoodwishEdge\Modules\Shortcodes\CustomFont\CustomFont;
use GoodwishEdge\Modules\Shortcodes\Dropcaps\Dropcaps;
use GoodwishEdge\Modules\Shortcodes\ElementsHolder\ElementsHolder;
use GoodwishEdge\Modules\Shortcodes\ElementsHolderItem\ElementsHolderItem;
use GoodwishEdge\Modules\Shortcodes\GoogleMap\GoogleMap;
use GoodwishEdge\Modules\Shortcodes\Highlight\Highlight;
use GoodwishEdge\Modules\Shortcodes\Icon\Icon;
use GoodwishEdge\Modules\Shortcodes\IconListItem\IconListItem;
use GoodwishEdge\Modules\Shortcodes\IconWithText\IconWithText;
use GoodwishEdge\Modules\Shortcodes\ImageGallery\ImageGallery;
use GoodwishEdge\Modules\Shortcodes\ImageWithText\ImageWithText;
use GoodwishEdge\Modules\Shortcodes\ItemShowcase\ItemShowcase;
use GoodwishEdge\Modules\Shortcodes\ItemShowcaseListItem\ItemShowcaseListItem;
use GoodwishEdge\Modules\Shortcodes\Message\Message;
use GoodwishEdge\Modules\Shortcodes\OrderedList\OrderedList;
use GoodwishEdge\Modules\Shortcodes\PieCharts\PieChartBasic\PieChartBasic;
use GoodwishEdge\Modules\Shortcodes\PieCharts\PieChartDoughnut\PieChartDoughnut;
use GoodwishEdge\Modules\Shortcodes\PieCharts\PieChartDoughnut\PieChartPie;
use GoodwishEdge\Modules\Shortcodes\PieCharts\PieChartWithIcon\PieChartWithIcon;
use GoodwishEdge\Modules\Shortcodes\PricingTables\PricingTables;
use GoodwishEdge\Modules\Shortcodes\PricingTable\PricingTable;
use GoodwishEdge\Modules\Shortcodes\Process\ProcessHolder;
use GoodwishEdge\Modules\Shortcodes\Process\ProcessItem;
use GoodwishEdge\Modules\Shortcodes\ProgressBar\ProgressBar;
use GoodwishEdge\Modules\Shortcodes\ProjectPresentation\ProjectPresentation;
use GoodwishEdge\Modules\Shortcodes\ReservationForm\ReservationForm;
use GoodwishEdge\Modules\Shortcodes\SectionSubtitle\SectionSubtitle;
use GoodwishEdge\Modules\Shortcodes\Separator\Separator;
use GoodwishEdge\Modules\Shortcodes\ShopMasonry\ShopMasonry;
use GoodwishEdge\Modules\Shortcodes\SocialShare\SocialShare;
use GoodwishEdge\Modules\Shortcodes\Tabs\Tabs;
use GoodwishEdge\Modules\Shortcodes\Tab\Tab;
use GoodwishEdge\Modules\Shortcodes\Team\Team;
use GoodwishEdge\Modules\Shortcodes\TitleWithNumber\TitleWithNumber;
use GoodwishEdge\Modules\Shortcodes\UnorderedList\UnorderedList;
use GoodwishEdge\Modules\Shortcodes\VideoButton\VideoButton;
use GoodwishEdge\Modules\Shortcodes\WorkingHours\WorkingHours;
use GoodwishEdge\Modules\Shortcodes\CauseList\CauseList;
use GoodwishEdge\Modules\Shortcodes\CauseSlider\CauseSlider;

/**
 * Class ShortcodeLoader
 */
class ShortcodeLoader {
    /**
     * @var private instance of current class
     */
    private static $instance;
    /**
     * @var array
     */
    private $loadedShortcodes = array();

    /**
     * Private constuct because of Singletone
     */
    private function __construct() {}

    /**
     * Private sleep because of Singletone
     */
    private function __wakeup() {}

    /**
     * Private clone because of Singletone
     */
    private function __clone() {}

    /**
     * Returns current instance of class
     * @return ShortcodeLoader
     */
    public static function getInstance() {
        if(self::$instance == null) {
            return new self;
        }

        return self::$instance;
    }

    /**
     * Adds new shortcode. Object that it takes must implement ShortcodeInterface
     * @param ShortcodeInterface $shortcode
     */
    private function addShortcode(ShortcodeInterface $shortcode) {
        if(!array_key_exists($shortcode->getBase(), $this->loadedShortcodes)) {
            $this->loadedShortcodes[$shortcode->getBase()] = $shortcode;
        }
    }

    /**
     * Adds all shortcodes.
     *
     * @see ShortcodeLoader::addShortcode()
     */
    private function addShortcodes() {
        $this->addShortcode(new Accordion());
        $this->addShortcode(new AccordionTab());
        $this->addShortcode(new AnimationsHolder());
        $this->addShortcode(new Blockquote());
        $this->addShortcode(new BlogList());
        $this->addShortcode(new BlogSlider());
        $this->addShortcode(new Button());
        $this->addShortcode(new CallToAction());
        $this->addShortcode(new Counter());
        $this->addShortcode(new Countdown());
        $this->addShortcode(new CustomFont());
        $this->addShortcode(new Dropcaps());
        $this->addShortcode(new ElementsHolder());
        $this->addShortcode(new ElementsHolderItem());
        $this->addShortcode(new GoogleMap());
        $this->addShortcode(new Highlight());
        $this->addShortcode(new Icon());
        $this->addShortcode(new IconListItem());
        $this->addShortcode(new IconWithText());
        $this->addShortcode(new ImageGallery());
        $this->addShortcode(new ImageWithText());
        $this->addShortcode(new ItemShowcase());
        $this->addShortcode(new ItemShowcaseListItem());
        $this->addShortcode(new Message());
        $this->addShortcode(new OrderedList());
        $this->addShortcode(new PieChartBasic());
        $this->addShortcode(new PieChartPie());
        $this->addShortcode(new PieChartDoughnut());
        $this->addShortcode(new PieChartWithIcon());
        $this->addShortcode(new PricingTables());
        $this->addShortcode(new PricingTable());
        $this->addShortcode(new ProgressBar());
        $this->addShortcode(new ProcessHolder());
        $this->addShortcode(new ProcessItem());
        $this->addShortcode(new ReservationForm());
        $this->addShortcode(new SectionSubtitle());
        $this->addShortcode(new Separator());
        $this->addShortcode(new SocialShare());
        $this->addShortcode(new Tabs());
        $this->addShortcode(new Tab());
        $this->addShortcode(new Team());
        $this->addShortcode(new TitleWithNumber());
        $this->addShortcode(new UnorderedList());
        $this->addShortcode(new VideoButton());
        $this->addShortcode(new Banner());
        $this->addShortcode(new ProjectPresentation());
        $this->addShortcode(new WorkingHours());

        if (goodwish_edge_is_woocommerce_installed()) {
	        $this->addShortcode(new ShopMasonry());
	    }

        if (goodwish_edge_is_give_installed()){
	        $this->addShortcode(new CauseList());
	        $this->addShortcode(new CauseSlider());
		}
    }
    /**
     * Calls ShortcodeLoader::addShortcodes and than loops through added shortcodes and calls render method
     * of each shortcode object
     */
    public function load() {
        $this->addShortcodes();

        foreach ($this->loadedShortcodes as $shortcode) {
            add_shortcode($shortcode->getBase(), array($shortcode, 'render'));
        }
    }
}

$shortcodeLoader = ShortcodeLoader::getInstance();
$shortcodeLoader->load();