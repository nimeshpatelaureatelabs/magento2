<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magento\Cms\Test\TestCase;

use Magento\Cms\Test\Fixture\CmsPage as CmsPageFixture;
use Magento\Cms\Test\Page\Adminhtml\CmsPageIndex;
use Magento\Cms\Test\Page\Adminhtml\CmsPageNew;
use Magento\Mtf\TestCase\Injectable;

/**
 * Steps:
 * 1. Log in to Backend.
 * 2. Navigate to Content > Elements > Pages.
 * 3. Start to create new CMS Page.
 * 4. Fill out fields data according to data set.
 * 5. Save CMS Page.
 * 6. Verify created CMS Page.
 *
 * @group CMS_Content_(PS)
 * @ZephyrId MAGETWO-25580
 */
class CreateCmsPageEntityTest extends Injectable
{
    /* tags */
    const MVP = 'yes';
    const DOMAIN = 'PS';
    const TEST_TYPE = 'acceptance_test';
    const TO_MAINTAIN = 'yes';
    const STABLE = 'no';
    /* end tags */

    /**
     * CmsIndex page.
     *
     * @var CmsPageIndex
     */
    protected $cmsIndex;

    /**
     * CmsPageNew page.
     *
     * @var CmsPageNew
     */
    protected $cmsPageNew;

    /**
     * Inject pages.
     *
     * @param CmsPageIndex $cmsIndex
     * @param CmsPageNew $cmsPageNew
     * @return void
     */
    public function __inject(CmsPageIndex $cmsIndex, CmsPageNew $cmsPageNew)
    {
        $this->cmsIndex = $cmsIndex;
        $this->cmsPageNew = $cmsPageNew;
    }

    /**
     * Creating Cms page.
     *
     * @param CmsPageFixture $cms
     * @return void
     */
    public function test(CmsPageFixture $cms)
    {
        // Steps
        $this->cmsIndex->open();
        $this->cmsIndex->getPageActionsBlock()->addNew();
        $this->cmsPageNew->getPageForm()->fill($cms);
        $this->cmsPageNew->getPageMainActions()->save();
    }
}
