<?php
/*
 * This file is part of RaizinPaginator.
 * (c) 2012 TANAKA Koichi <mugeso@mugeso.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Raizin\Paginator;

/**
 * Number convertor.
 *
 * This class provides page-number <-> offset conversion.
 *
 * @author TANAKA Koichi <mugeso@mugeso.com>
 */
class NumberConvertor
{
    /**
     * items per page.
     * @var int
     */
    private $_itemsPerPage;

    /**
     * Constructor
     *
     * @param int $itemsPerPage
     */
    public function __construct($itemsPerPage)
    {
        $this->_itemsPerPage = $itemsPerPage;
    }

    /**
     * Convert page-number to offset.
     *
     * @param int $page page-number to be converted.
     * @return int
     */
    public function convertPageToOffset($page)
    {
        return ($page - 1)*$this->_itemsPerPage;
    }

    /**
     * Convert offset to page-number.
     *
     * This method returns page-number which contains offset.
     *
     * @param int $offset zero-based indexing offset
     * @return int page number
     */
    public function convertOffsetToPage($offset)
    {
        return intval(floor($offset/$this->_itemsPerPage)) + 1;
    }

    /**
     * Convert count to page-number.
     *
     * This method returns page-number which contains count.
     *
     * @param int $count item count.
     * @return int page number
     */
    public function convertCountToPage($count)
    {
        return $this->convertOffsetToPage($count - 1);
    }
}
