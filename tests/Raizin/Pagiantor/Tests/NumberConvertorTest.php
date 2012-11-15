<?php
/*
 * This file is part of RaizinPaginator.
 * (c) 2012 TANAKA Koichi <mugeso@mugeso.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Raizin\Paginator\Tests;

use Raizin\Paginator\NumberConvertor;

/**
 * Test case for Raizin\Paginator\NumberConvertor
 *
 * @category Test
 * @package Paginator
 */
class NumberConvertorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider providePageToOffsetPairAndItemsPerPage
     * @param int $page
     * @param int $expectedOffset
     * @param int $itemsPerPage
     */
    public function testConvertPagetToOffset($page, $expectedOffset, $itemsPerPage)
    {
        $convertor = new NumberConvertor($itemsPerPage);
        $this->assertSame($expectedOffset, $convertor->convertPageToOffset($page));
    }

    public function providePageToOffsetPairAndItemsPerPage()
    {
        return array(
            'page 1/ipp 10' => array(1, 0, 10),
            'page 2/ipp 10' => array(2, 10, 10),
            'page 3/ipp 10' => array(3, 20, 10),
            'page 3/ipp 11' => array(3, 22, 11),
        );
    }

    /**
     * @dataProvider provideOffsetAndPagePairAndItemsPerPage
     * @param int $offset
     * @param int $expectedPage
     * @param int $itemsPerPage
     */
    public function testConvertOffsetToPage($offset, $expectedPage, $itemsPerPage)
    {
        $convertor = new NumberConvertor($itemsPerPage);
        $this->assertSame($expectedPage, $convertor->convertOffsetToPage($offset));
    }

    public function provideOffsetAndPagePairAndItemsPerPage()
    {
        return array(
            'offset 0/ipp 10' => array(0, 1, 10),
            'offset 9/ipp 10' => array(9, 1, 10),
            'offset 10/ipp 10' => array(10, 2, 10),
            'offset 10/ipp 11' => array(10, 1, 11),
        );
    }

    /**
     * @dataProvider provideCountAndPagePairAndItemsPerPage
     * @param int $count
     * @param int $expectedPage
     * @param int $itemsPerPage
     */
    public function testConvertCountToPage($count, $expectedPage, $itemsPerPage)
    {
        $convertor = new NumberConvertor($itemsPerPage);
        $this->assertSame($expectedPage, $convertor->convertCountToPage($count));
    }

    public function provideCountAndPagePairAndItemsPerPage()
    {
        return array(
            'count 0/ipp 10' => array(0, 0, 10),
            'count 10/ipp 10' => array(10, 1, 10),
            'count 11/ipp 10' => array(11, 2, 10),
            'count 11/ipp 11' => array(11, 1, 11),
        );
    }
} 
