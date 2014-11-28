<?php

class KT_Repository {

    const DEFAULT_LIMIT = 30;
    const DEFAULT_RELATION = 'AND';

    private $currentItem = null;
    private $iterator = 0;
    private $items = array();
    private $table = null;
    private $relation = self::DEFAULT_RELATION;
    private $orderby = null;
    private $order = "ASC";
    private $limit = null;
    private $offset = null;
    private $queryParams = array();
    private $errors = array();
    private $query = null;
    private $className = null;
    private $countItems = 0;

    /**
     * Založení objektu se sadou itemů
     * pro iterování kolekce lze požit $object->haveItems() $object->theItem()
     * lze použít pouze v loopět while()
     *
     * @author Tomáš Kocifaj <kocifaj@ktstudio.cz>
     * @link http://www.KTStudio.cz
     *
     * @param string $className // který objekt bude repositář iterovat - Název classy
     * @param string $table // Z které tabulky bude repositář selectovat data
     * @throws InvalidArgumentException
     */
    public function __construct($className, $table) {

        if (is_string($table)) {
            $this->table = $table;
        } else {
            throw new KT_Not_Supported_Exception('table is not a string');
        }

        if (is_string($table)) {
            $this->className = $className;
        } else {
            throw new KT_Not_Supported_Exception('className is not a string');
        }
    }

    // --- gettery ------------

    /**
     * Vrátí aktuální objekt, na kterém se nachází vnitřní iterátor pomoc haveItems() a theItems()
     * 
     * @author Tomáš Kocifaj <kocifaj@ktstudio.cz>
     * @link http://www.KTStudio.cz
     * 
     * @return object - dle definice className
     */
    public function getCurrentItem() {
        return $this->currentItem;
    }

    /**
     * Vrátí aktuální hodnotu iterátoru (indexu), na kterém se iterace objektu nachází
     * 
     * @author Tomáš Kocifaj <kocifaj@ktstudio.cz>
     * @link http://www.KTStudio.cz
     * 
     * @return int
     */
    protected function getIterator() {
        return $this->iterator;
    }

    /**
     * Vrátí kolekci všech objektů, které byly dle SQL dotazu načteny
     * 
     * @author Tomáš Kocifaj <kocifaj@ktstudio.cz>
     * @link http://www.KTStudio.cz
     * 
     * @return array
     */
    public function getItems() {
        return $this->items;
    }

    /**
     * Vrátí název tabulky, nad kterou budou probíhat základní dotazy na selekci dat
     * 
     * @author Tomáš Kocifaj <kocifaj@ktstudio.cz>
     * @link http://www.KTStudio.cz
     * 
     * @return string
     */
    protected function getTable() {
        return $this->table;
    }

    /**
     * Vrátí základní relaci mezi WHERE parametry
     * 
     * @author Tomáš Kocifaj <kocifaj@ktstudio.cz>
     * @link http://www.KTStudio.cz
     * 
     * @return string
     */
    protected function getRelation() {
        return $this->relation;
    }

    /**
     * Vrátí název sloupce, podle kterého se bude výsledek dotazu v repositáři řadit
     * 
     * @author Tomáš Kocifaj <kocifaj@ktstudio.cz>
     * @link http://www.KTStudio.cz
     * 
     * @return string
     */
    protected function getOrderby() {
        return $this->orderby;
    }

    /**
     * Vrátí, zda se má dotaz řadit ASC nebo DESC
     * 
     * @author Tomáš Kocifaj <kocifaj@ktstudio.cz>
     * @link http://www.KTStudio.cz
     * 
     * @return type
     */
    protected function getOrder() {
        return $this->order;
    }

    /**
     * Vrátí LIMIT pro SQL dotaz
     * 
     * @author Tomáš Kocifaj <kocifaj@ktstudio.cz>
     * @link http://www.KTStudio.cz
     * 
     * @return int
     */
    protected function getLimit() {
        return $this->limit;
    }

    /**
     * Vrátí OFFSET pro SQL dotaz - LIMIT 10,10 (offset)
     * 
     * @author Tomáš Kocifaj <kocifaj@ktstudio.cz>
     * @link http://www.KTStudio.cz
     * 
     * @return int
     */
    protected function getOffset() {
        return $this->offset;
    }

    /**
     * Vrátí kolekci všech WHERE parametrů, které byly objektu definovány pro select dotaz
     * 
     * @author Tomáš Kocifaj <kocifaj@ktstudio.cz>
     * @link http://www.KTStudio.cz
     * 
     * @return array
     */
    private function getQueryParams() {
        return $this->queryParams;
    }

    /**
     * Vrátí kolekci všech chyb, které byly při používání objektu zavedeny
     * 
     * @author Tomáš Kocifaj <kocifaj@ktstudio.cz>
     * @link http://www.KTStudio.cz
     * 
     * @return type
     */
    public function getErrors() {
        return $this->errors;
    }

    /**
     * Vrátí vytvořenou Query pro select dat z DB
     * 
     * @return type
     */
    private function getQuery() {
        return $this->query;
    }

    /**
     * Vrátí název objektu, který má být iterován
     * 
     * @author Tomáš Kocifaj <kocifaj@ktstudio.cz>
     * @link http://www.KTStudio.cz
     * 
     * @return string
     */
    private function getClassName() {
        return $this->className;
    }

    /**
     * Vrátí celkový počet všechn potenciálních výsledku bez ohledu na nastavení LIMIT nebo offset
     * 
     * @author Tomáš Kocifaj <kocifaj@ktstudio.cz>
     * @link http://www.KTStudio.cz
     * 
     * @return int
     */
    public function getCountItems() {
        return $this->countItems;
    }

    // --- settery ------------

    /**
     * Nastaví, na jakém itemu se aktuální iterovaný kolekce nachází
     * 
     * @author Tomáš Kocifaj <kocifaj@ktstudio.cz>
     * @link http://www.KTStudio.cz
     * 
     * @param int $currentItem
     * @return \KT_Repository
     */
    private function setCurrentItem($currentItem) {
        $this->currentItem = $currentItem;

        return $this;
    }

    /**
     * Nastaví aktuální pozici iterátoru
     * 
     * @author Tomáš Kocifaj <kocifaj@ktstudio.cz>
     * @link http://www.KTStudio.cz
     * 
     * @param int $iterator
     * @return \KT_Repository
     */
    private function setIterator($iterator) {
        if (kt_is_id_format($iterator)) {
            $iterator = kt_try_get_int($iterator);
            $this->iterator = $iterator;
        }

        return $this;
    }

    /**
     * Nastaví kolekci itemů
     * 
     * @author Tomáš Kocifaj <kocifaj@ktstudio.cz>
     * @link http://www.KTStudio.cz
     * 
     * @param array $items
     * @return \KT_Repository
     */
    public function setItems(array $items) {
        $this->items = $items;
        return $this;
    }

    /**
     * Nastaví název tabulky, odkud bude repositář stahovat data
     * 
     * @author Tomáš Kocifaj <kocifaj@ktstudio.cz>
     * @link http://www.KTStudio.cz
     * 
     * @param string $table
     * @return \KT_Repository
     */
    public function setTable($table) {
        $this->table = $table;
        return $this;
    }

    /**
     * Nastaví relační podmínku pro Where dotazy - default 'AND'
     *
     * @author Tomáš Kocifaj
     * @link http://www.KTStudio.cz
     *
     * @param string $relation
     * @return \KT_Repository
     */
    public function setRelation($relation) {
        if (is_string($relation)) {
            $this->relation = $relation;
        }

        return $this;
    }

    /**
     * Nastaví, podle kterého sloupce má být kolekce itemů seřazena při dotazu repositáře
     * 
     * @author Tomáš Kocifaj <kocifaj@ktstudio.cz>
     * @link http://www.KTStudio.cz
     * 
     * @param type $orderby
     * @return \KT_Repository
     */
    public function setOrderby($orderby) {
        $this->orderby = $orderby;
        return $this;
    }

    /**
     * Nastavení řazení order hodnoty pro dotaz repositáře
     *
     * @author Tomáš Kocifaj <kocifaj@ktstudio.cz>
     * @link http://www.KTStudio.cz
     *
     * @param string $order // ASCE | DESC
     * @return \KT_Repository
     * @throws KT_Not_Supported_Exception
     */
    public function setOrder($order = "DESC") {
        if ($order == "ASC" || $order == "DESC") {
            $this->order = $order;
            return $this;
        }

        throw new KT_Not_Supported_Exception("Order have to by string - ASC or DESC");
    }

    /**
     * Nastavení LIMIT a pro dotaz repositáře
     *
     * @author Tomáš Kocifaj <kocifaj@ktstudio.cz>
     * @link http://www.KTStudio.cz
     *
     * @param int $limit
     * @return \KT_Repository
     * @throws KT_Not_Set_Argument_Exception
     */
    public function setLimit($limit) {
        if (kt_is_id_format($limit)) {
            $limit = kt_try_get_int($limit);
            $this->limit = $limit;
        }

        return $this;
    }

    /**
     * Nastaví offset dotazu (LIMIT)
     * 
     * @author Tomáš Kocifaj <kocifaj@ktstudio.cz>
     * @link http://www.KTStudio.cz
     * 
     * @param int $offset
     * @return \KT_Repository
     */
    public function setOffset($offset) {
        $this->offset = $offset;
        return $this;
    }

    /**
     * Nastaví kolekce všechn where paramtrů, které byly v rámci repositáře vydefinovány
     * 
     * @author Tomáš Kocifaj <kocifaj@ktstudio.cz>
     * @link http://www.KTStudio.cz
     * 
     * @param array $queryParams
     * @return \KT_Repository
     */
    protected function setQueryParams(array $queryParams) {
        $this->queryParams = $queryParams;
        return $this;
    }

    /**
     * Nastaví kolekci všech chyb, které byly v rámci použití objekty zjištěny
     * 
     * @author Tomáš Kocifaj <kocifaj@ktstudio.cz>
     * @link http://www.KTStudio.cz
     * 
     * @param array $error
     * @return \KT_Repository
     */
    protected function setErrors(array $error) {
        $this->errors = $error;
        return $this;
    }

    /**
     * Nastavení query pro selekci dat MySQL
     * 
     * @author Tomáš Kocifaj <kocifaj@ktstudio.cz>
     * @link http://www.KTStudio.cz
     * 
     * @param string $query
     * @return \KT_Repository
     */
    private function setQuery($query) {
        $this->query = $query;
        return $this;
    }

    /**
     * Nastaví název objektu, který bude vracen spolu s daty při iteraci repositáře
     * 
     * @author Tomáš Kocifaj <kocifaj@ktstudio.cz>
     * @link http://www.KTStudio.cz
     * 
     * @param string $className
     * @return \KT_Repository
     */
    protected function setClassName($className) {
        $this->className = $className;
        return $this;
    }

    /**
     * Nastaví, kolik celkových výsledků bylo při nastavené dotazu zjištěno.
     * 
     * @author Tomáš Kocifaj <kocifaj@ktstudio.cz>
     * @link http://www.KTStudio.cz
     * 
     * @param int $countItems
     * @return \KT_Repository
     */
    protected function setCountItems($countItems) {
        if (kt_is_id_format($countItems)) {
            $countItems = kt_try_get_int($countItems);
            $this->countItems = $countItems;
        }

        return $this;
    }

    // --- veřejné funkce ------------

    /**
     * Nastaví ručně tvořenou query se sadou dat pro prepare statment
     * 
     * @author Tomáš Kocifaj <kocifaj@ktstudio.cz>
     * @link http://www.KTStudio.cz
     * 
     * @global wpdb $wpdb
     * @param string $query
     * @param array $prepareStatmentData
     * @throws KT_Not_Supported_Exception
     */
    public function setCustomQuery($query, array $prepareStatmentData = array()) {
        global $wpdb;

        $prepareQuery = $wpdb->prepare($query, $prepareStatmentData);

        if (kt_isset_and_not_empty($prepareQuery)) {
            $this->setQuery($prepareQuery);
            return $this;
        }

        throw new KT_Not_Supported_Exception("Query or prepare dadta error");
    }

    /**
     * Přidá jeden parametr do Where selectu dat
     *
     * @author Tomáš Kocifaj
     * @link http://www.KTStudio.cz
     *
     * @param string $column
     * @param mixed $value
     * @param string $condition // = < > =< => <> - běžné DB MySQL conditions
     * @return \KT_Repository
     */
    public function addWhereParam($column, $value, $condition = '=') {
        $newWhereParams = array(
            'column' => $column,
            'value' => $value,
            'condition' => $condition
        );

        $currentWhereParams = $this->getQueryParams();
        array_push($currentWhereParams, $newWhereParams);

        $this->setQueryParams($currentWhereParams);

        return $this;
    }

    /**
     * Přidá WHERE parametr, kde se dotazuje na to, zda v daném sloupci je nastasven NULL
     *
     * @author Tomáš Kocifaj
     * @link http://www.KTStudio.cz
     *
     * @param type $column
     * @return \KT_Repository
     */
    public function addWhereIsNotNull($column) {
        $newWhereParams = array(
            'column' => $column,
            'value' => " IS NOT NULL "
        );

        $currentWhereParams = $this->getQueryParams();
        array_push($currentWhereParams, $newWhereParams);

        $this->setQueryParams($currentWhereParams);

        return $this;
    }

    /**
     * Přidá WHERE parametr, kde se dotazuje na to, zda ve sloupci je nějaká hodnota - tedy není NULL
     *
     * @author Tomáš Kocifaj
     * @link http://www.KTStudio.cz
     *
     * @param type $column
     * @return \KT_Repository
     */
    public function addWhereIsNull($column) {
        $newWhereParams = array(
            'column' => $column,
            'value' => " IS NULL "
        );

        $currentWhereParams = $this->getQueryParams();
        array_push($currentWhereParams, $newWhereParams);

        $this->setQueryParams($currentWhereParams);

        return $this;
    }

    /**
     * Naplní kolekci items příslušnými ID záznamů v DB
     *
     * @author Tomáš Kocifaj
     * @link http://www.KTStudio.cz
     *
     * @global wpdb $wpdb // globální proměnná pro práci s DB v rámci WP
     * @return \KT_Repository
     */
    public function selectData() {
        global $wpdb;

        if (kt_not_isset_or_empty($this->getQuery())) {
            $this->createQuery();
        }

        $query = $this->getQuery();
        $countItems = $this->getCoutOfAllItemsInDb();
        $this->setCountItems($countItems);

        $result = $wpdb->get_results($query, ARRAY_A);

        if ($result === false) {
            $this->addError('Při selekci dat se vyskytla chyba', $wpdb->last_error);
        }

        if (count($result) > 0) {
            foreach ($result as $value) {
                /* @var $item \KT_Crud */
                $item = new $this->className();
                $item->setData($value);
                $itemsColection[] = $item;
            }

            $this->setItems($itemsColection);
        }

        return $this;
    }

    /**
     * Vrací TRUE když v procházení kolekce má ještě další item k iteraci
     *
     * @author Tomáš Kocifaj
     * @link http://www.KTStudio.cz
     *
     * @return boolean
     */
    public function haveItems() {
        $itemCount = count($this->getItems());

        if ($itemCount > $this->getIterator()) {
            return true;
        }

        return false;
    }

    /**
     * V procházení kolekce nastaví aktuální $item
     *
     * @author Tomáš Kocifaj <kocifaj@ktstudio.cz>
     * @link http://www.KTStudio.cz
     *
     * @return object dle zadaného parametru v constructoru
     */
    public function theItem() {
        $itemCollection = $this->getItems();
        $currentItem = $itemCollection[$this->getIterator()];
        $this->setCurrentItem($currentItem);
        $this->iterator ++;

        return $this->getCurrentItem();
    }

    // --- privátní metody ------------

    /**
     * Připráví základní string s query na základě specifikovaných where podmínek
     *
     * @author Tomáš Kocifaj <kocifaj@ktstudio.cz>
     * @link http://www.KTStudio.cz
     *
     * @return array
     */
    private function createConditionsQuery() {

        if (kt_not_isset_or_empty($this->getQueryParams())) {
            return "";
        }

        $preparedData = array();
        $query = "";

        $paramsCount = count($this->getQueryParams()) - 1;

        $query .=" WHERE ";

        foreach ($this->getQueryParams() as $key => $value) {

            if (kt_isset_and_not_empty($value['condition'])) {
                $query .= "{$value['column']} {$value['condition']} {$this->getValueTypeForDbQuery($value['value'])}";
                array_push($preparedData, $value['value']);
            }

            if ($paramsCount != $key && $paramsCount > 0) {
                $query .= " {$this->getRelation()} ";
            }
        }

        return $conditionData = array("query" => $query, "prepareData" => $preparedData);
    }

    /**
     * Na základě parametrů zadané v objektu sestaví celé Query pro DB
     *
     * @author Tomáš Kocifaj <kocifaj@ktstudio.cz>
     * @link http://www.KTStudio.cz
     *
     * @param string $selectWhat
     */
    private function createQuery() {

        global $wpdb;

        $preparData = array();
        $offset = "";

        $query = "SELECT * FROM {$this->getTable()}";

        $conditionData = $this->createConditionsQuery();

        if (kt_isset_and_not_empty($conditionData)) {
            $query .= $conditionData["query"];
            $preparData = array_merge($preparData, $conditionData["prepareData"]);
        }

        if (kt_isset_and_not_empty($this->getOrderby())) {
            $query .= " ORDER BY {$this->getOrderby()} {$this->getOrder()}";
        }

        if (kt_isset_and_not_empty($this->getLimit())) {
            if (kt_isset_and_not_empty($this->getOffset())) {
                $offset = "%d ,";
                array_push($preparData, $this->getOffset());
            }
            $query .= " LIMIT $offset %d";
            array_push($preparData, $this->getLimit());
        }

        $this->setQuery($wpdb->prepare($query, $preparData));

        return $this;
    }

    /**
     * Zjistí počet všech záznam, které odpovídají zadanému selectu
     * Používá se pro stránkování
     *
     * @author Tomáš Kocifaj <kocifaj@ktstudio.cz>
     * @link http://www.KTStudio.cz
     *
     * @global wpdb $wpdb
     * @return type
     */
    private function getCoutOfAllItemsInDb() {
        global $wpdb;

        if (kt_not_isset_or_empty($this->getQuery())) {
            $this->createQuery('COUNT(*)');
        }

        $result = $wpdb->get_var($this->getQuery());

        if ($result === false) {
            $this->addError('Při selekci dat se vyskytla chyba', $wpdb->last_error);
        }

        return $result;
    }

    /**
     * Přidá objektu Error
     *
     * @author Tomáš Kocifaj <kocifaj@ktstudio.cz>
     * @link http://www.KTStudio.cz
     *
     * @param type $message
     * @param type $content
     */
    private function addError($message, $content) {
        $this->errors[] = array($message, $content);
    }

    /**
     * Vrátí hash znak pro preparStatments za účelem vytvoření query pro $wpdb
     * 
     * @author Tomáš Kocifaj <kocifaj@ktstudio.cz>
     * @link http://www.KTStudio.cz 
     * 
     * @param str|int|float $value
     * @return string
     * @throws InvalidArgumentException
     */
    private function getValueTypeForDbQuery($value) {
        if (is_int($value)) {
            return $type = "%d";
        } elseif (is_float($value)) {
            return $type = "%f";
        } elseif (is_string($value)) {
            return $type = "%s";
        }

        throw new InvalidArgumentException("value for db query is not correct value");
    }

}
