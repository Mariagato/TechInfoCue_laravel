<?php

require_once app_path('Analytics/service/Google_ServiceResource.php');
/*
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */


/**
 * The "management" collection of methods.
 * Typical usage is:
 *  <code>
 *   $analyticsService = new Google_AnalyticsService(...);
 *   $management = $analyticsService->management;
 *  </code>
 */
class Google_ManagementServiceResource extends Google_ServiceResource
{


}

/**
 * The "webproperties" collection of methods.
 * Typical usage is:
 *  <code>
 *   $analyticsService = new Google_AnalyticsService(...);
 *   $webproperties = $analyticsService->webproperties;
 *  </code>
 */
class Google_ManagementWebpropertiesServiceResource extends Google_ServiceResource
{


    /**
     * Lists web properties to which the user has access. (webproperties.list)
     *
     * @param string $accountId Account ID to retrieve web properties for. Can either be a specific account ID or '~all', which refers to all the accounts that user has access to.
     * @param array $optParams Optional parameters.
     *
     * @opt_param int max-results The maximum number of web properties to include in this response.
     * @opt_param int start-index An index of the first entity to retrieve. Use this parameter as a pagination mechanism along with the max-results parameter.
     * @return Google_Webproperties
     */
    public function listManagementWebproperties($accountId, $optParams = array())
    {
        $params = array('accountId' => $accountId);
        $params = array_merge($params, $optParams);
        $data   = $this->__call('list', array($params));
        if ($this->useObjects()) {
            return new Google_Webproperties($data);
        } else {
            return $data;
        }
    }
}

/**
 * The "segments" collection of methods.
 * Typical usage is:
 *  <code>
 *   $analyticsService = new Google_AnalyticsService(...);
 *   $segments = $analyticsService->segments;
 *  </code>
 */
class Google_ManagementSegmentsServiceResource extends Google_ServiceResource
{


    /**
     * Lists advanced segments to which the user has access. (segments.list)
     *
     * @param array $optParams Optional parameters.
     *
     * @opt_param int max-results The maximum number of advanced segments to include in this response.
     * @opt_param int start-index An index of the first advanced segment to retrieve. Use this parameter as a pagination mechanism along with the max-results parameter.
     * @return Google_Segments
     */
    public function listManagementSegments($optParams = array())
    {
        $params = array();
        $params = array_merge($params, $optParams);
        $data   = $this->__call('list', array($params));
        if ($this->useObjects()) {
            return new Google_Segments($data);
        } else {
            return $data;
        }
    }
}

/**
 * The "accounts" collection of methods.
 * Typical usage is:
 *  <code>
 *   $analyticsService = new Google_AnalyticsService(...);
 *   $accounts = $analyticsService->accounts;
 *  </code>
 */
class Google_ManagementAccountsServiceResource extends Google_ServiceResource
{


    /**
     * Lists all accounts to which the user has access. (accounts.list)
     *
     * @param array $optParams Optional parameters.
     *
     * @opt_param int max-results The maximum number of accounts to include in this response.
     * @opt_param int start-index An index of the first account to retrieve. Use this parameter as a pagination mechanism along with the max-results parameter.
     * @return Google_Accounts
     */
    public function listManagementAccounts($optParams = array())
    {
        $params = array();
        $params = array_merge($params, $optParams);
        $data   = $this->__call('list', array($params));
        if ($this->useObjects()) {
            return new Google_Accounts($data);
        } else {
            return $data;
        }
    }
}

/**
 * The "goals" collection of methods.
 * Typical usage is:
 *  <code>
 *   $analyticsService = new Google_AnalyticsService(...);
 *   $goals = $analyticsService->goals;
 *  </code>
 */
class Google_ManagementGoalsServiceResource extends Google_ServiceResource
{


    /**
     * Lists goals to which the user has access. (goals.list)
     *
     * @param string $accountId Account ID to retrieve goals for. Can either be a specific account ID or '~all', which refers to all the accounts that user has access to.
     * @param string $webPropertyId Web property ID to retrieve goals for. Can either be a specific web property ID or '~all', which refers to all the web properties that user has access to.
     * @param string $profileId Profile ID to retrieve goals for. Can either be a specific profile ID or '~all', which refers to all the profiles that user has access to.
     * @param array $optParams Optional parameters.
     *
     * @opt_param int max-results The maximum number of goals to include in this response.
     * @opt_param int start-index An index of the first goal to retrieve. Use this parameter as a pagination mechanism along with the max-results parameter.
     * @return Google_Goals
     */
    public function listManagementGoals($accountId, $webPropertyId, $profileId, $optParams = array())
    {
        $params = array('accountId' => $accountId, 'webPropertyId' => $webPropertyId, 'profileId' => $profileId);
        $params = array_merge($params, $optParams);
        $data   = $this->__call('list', array($params));
        if ($this->useObjects()) {
            return new Google_Goals($data);
        } else {
            return $data;
        }
    }
}

/**
 * The "profiles" collection of methods.
 * Typical usage is:
 *  <code>
 *   $analyticsService = new Google_AnalyticsService(...);
 *   $profiles = $analyticsService->profiles;
 *  </code>
 */
class Google_ManagementProfilesServiceResource extends Google_ServiceResource
{


    /**
     * Lists profiles to which the user has access. (profiles.list)
     *
     * @param string $accountId Account ID for the profiles to retrieve. Can either be a specific account ID or '~all', which refers to all the accounts to which the user has access.
     * @param string $webPropertyId Web property ID for the profiles to retrieve. Can either be a specific web property ID or '~all', which refers to all the web properties to which the user has access.
     * @param array $optParams Optional parameters.
     *
     * @opt_param int max-results The maximum number of profiles to include in this response.
     * @opt_param int start-index An index of the first entity to retrieve. Use this parameter as a pagination mechanism along with the max-results parameter.
     * @return Google_Profiles
     */
    public function listManagementProfiles($accountId, $webPropertyId, $optParams = array())
    {
        $params = array('accountId' => $accountId, 'webPropertyId' => $webPropertyId);
        $params = array_merge($params, $optParams);
        $data   = $this->__call('list', array($params));
        if ($this->useObjects()) {
            return new Google_Profiles($data);
        } else {
            return $data;
        }
    }
}

/**
 * The "data" collection of methods.
 * Typical usage is:
 *  <code>
 *   $analyticsService = new Google_AnalyticsService(...);
 *   $data = $analyticsService->data;
 *  </code>
 */
class Google_DataServiceResource extends Google_ServiceResource
{


}

/**
 * The "mcf" collection of methods.
 * Typical usage is:
 *  <code>
 *   $analyticsService = new Google_AnalyticsService(...);
 *   $mcf = $analyticsService->mcf;
 *  </code>
 */
class Google_DataMcfServiceResource extends Google_ServiceResource
{


    /**
     * Returns Analytics Multi-Channel Funnels data for a profile. (mcf.get)
     *
     * @param string $ids Unique table ID for retrieving Analytics data. Table ID is of the form ga:XXXX, where XXXX is the Analytics profile ID.
     * @param string $start_date Start date for fetching Analytics data. All requests should specify a start date formatted as YYYY-MM-DD.
     * @param string $end_date End date for fetching Analytics data. All requests should specify an end date formatted as YYYY-MM-DD.
     * @param string $metrics A comma-separated list of Multi-Channel Funnels metrics. E.g., 'mcf:totalConversions,mcf:totalConversionValue'. At least one metric must be specified.
     * @param array $optParams Optional parameters.
     *
     * @opt_param int max-results The maximum number of entries to include in this feed.
     * @opt_param string sort A comma-separated list of dimensions or metrics that determine the sort order for the Analytics data.
     * @opt_param string dimensions A comma-separated list of Multi-Channel Funnels dimensions. E.g., 'mcf:source,mcf:medium'.
     * @opt_param int start-index An index of the first entity to retrieve. Use this parameter as a pagination mechanism along with the max-results parameter.
     * @opt_param string filters A comma-separated list of dimension or metric filters to be applied to the Analytics data.
     * @return Google_McfData
     */
    public function get($ids, $start_date, $end_date, $metrics, $optParams = array())
    {
        $params = array('ids' => $ids, 'start-date' => $start_date, 'end-date' => $end_date, 'metrics' => $metrics);
        $params = array_merge($params, $optParams);
        $data   = $this->__call('get', array($params));
        if ($this->useObjects()) {
            return new Google_McfData($data);
        } else {
            return $data;
        }
    }
}

/**
 * The "ga" collection of methods.
 * Typical usage is:
 *  <code>
 *   $analyticsService = new Google_AnalyticsService(...);
 *   $ga = $analyticsService->ga;
 *  </code>
 */
class Google_DataGaServiceResource extends Google_ServiceResource
{


    /**
     * Returns Analytics data for a profile. (ga.get)
     *
     * @param string $ids Unique table ID for retrieving Analytics data. Table ID is of the form ga:XXXX, where XXXX is the Analytics profile ID.
     * @param string $start_date Start date for fetching Analytics data. All requests should specify a start date formatted as YYYY-MM-DD.
     * @param string $end_date End date for fetching Analytics data. All requests should specify an end date formatted as YYYY-MM-DD.
     * @param string $metrics A comma-separated list of Analytics metrics. E.g., 'ga:visits,ga:pageviews'. At least one metric must be specified.
     * @param array $optParams Optional parameters.
     *
     * @opt_param int max-results The maximum number of entries to include in this feed.
     * @opt_param string sort A comma-separated list of dimensions or metrics that determine the sort order for Analytics data.
     * @opt_param string dimensions A comma-separated list of Analytics dimensions. E.g., 'ga:browser,ga:city'.
     * @opt_param int start-index An index of the first entity to retrieve. Use this parameter as a pagination mechanism along with the max-results parameter.
     * @opt_param string segment An Analytics advanced segment to be applied to data.
     * @opt_param string filters A comma-separated list of dimension or metric filters to be applied to Analytics data.
     * @return Google_GaData
     */
    public function get($ids, $start_date, $end_date, $metrics, $optParams = array())
    {
        $params = array('ids' => $ids, 'start-date' => $start_date, 'end-date' => $end_date, 'metrics' => $metrics);
        $params = array_merge($params, $optParams);
        $data   = $this->__call('get', array($params));
        if ($this->useObjects()) {
            return new Google_GaData($data);
        } else {
            return $data;
        }
    }
}

/**
 * Service definition for Google_Analytics (v3).
 *
 * <p>
 * View and manage your Google Analytics data
 * </p>
 *
 * <p>
 * For more information about this service, see the
 * <a href="http://code.google.com/apis/analytics" target="_blank">API Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_AnalyticsService extends Google_Service
{
    public $management_webproperties;
    public $management_segments;
    public $management_accounts;
    public $management_goals;
    public $management_profiles;
    public $data_mcf;
    public $data_ga;

    /**
     * Constructs the internal representation of the Analytics service.
     *
     * @param Google_Client $client
     */
    public function __construct(Google_Client $client)
    {
        $this->servicePath = 'analytics/v3/';
        $this->version     = 'v3';
        $this->serviceName = 'analytics';

        $client->addService($this->serviceName, $this->version);
        $this->management_webproperties = new Google_ManagementWebpropertiesServiceResource($this, $this->serviceName,
            'webproperties',
            json_decode('{"methods": {"list": {"scopes": ["https://www.googleapis.com/auth/analytics.readonly"], "parameters": {"max-results": {"type": "integer", "location": "query", "format": "int32"}, "start-index": {"minimum": "1", "type": "integer", "location": "query", "format": "int32"}, "accountId": {"required": true, "type": "string", "location": "path"}}, "id": "analytics.management.webproperties.list", "httpMethod": "GET", "path": "management/accounts/{accountId}/webproperties", "response": {"$ref": "Webproperties"}}}}',
                true));
        $this->management_segments      = new Google_ManagementSegmentsServiceResource($this, $this->serviceName,
            'segments',
            json_decode('{"methods": {"list": {"scopes": ["https://www.googleapis.com/auth/analytics.readonly"], "parameters": {"max-results": {"type": "integer", "location": "query", "format": "int32"}, "start-index": {"minimum": "1", "type": "integer", "location": "query", "format": "int32"}}, "response": {"$ref": "Segments"}, "httpMethod": "GET", "path": "management/segments", "id": "analytics.management.segments.list"}}}',
                true));
        $this->management_accounts      = new Google_ManagementAccountsServiceResource($this, $this->serviceName,
            'accounts',
            json_decode('{"methods": {"list": {"scopes": ["https://www.googleapis.com/auth/analytics.readonly"], "parameters": {"max-results": {"type": "integer", "location": "query", "format": "int32"}, "start-index": {"minimum": "1", "type": "integer", "location": "query", "format": "int32"}}, "response": {"$ref": "Accounts"}, "httpMethod": "GET", "path": "management/accounts", "id": "analytics.management.accounts.list"}}}',
                true));
        $this->management_goals         = new Google_ManagementGoalsServiceResource($this, $this->serviceName, 'goals',
            json_decode('{"methods": {"list": {"scopes": ["https://www.googleapis.com/auth/analytics.readonly"], "parameters": {"max-results": {"type": "integer", "location": "query", "format": "int32"}, "profileId": {"required": true, "type": "string", "location": "path"}, "start-index": {"minimum": "1", "type": "integer", "location": "query", "format": "int32"}, "webPropertyId": {"required": true, "type": "string", "location": "path"}, "accountId": {"required": true, "type": "string", "location": "path"}}, "id": "analytics.management.goals.list", "httpMethod": "GET", "path": "management/accounts/{accountId}/webproperties/{webPropertyId}/profiles/{profileId}/goals", "response": {"$ref": "Goals"}}}}',
                true));
        $this->management_profiles      = new Google_ManagementProfilesServiceResource($this, $this->serviceName,
            'profiles',
            json_decode('{"methods": {"list": {"scopes": ["https://www.googleapis.com/auth/analytics.readonly"], "parameters": {"max-results": {"type": "integer", "location": "query", "format": "int32"}, "start-index": {"minimum": "1", "type": "integer", "location": "query", "format": "int32"}, "webPropertyId": {"required": true, "type": "string", "location": "path"}, "accountId": {"required": true, "type": "string", "location": "path"}}, "id": "analytics.management.profiles.list", "httpMethod": "GET", "path": "management/accounts/{accountId}/webproperties/{webPropertyId}/profiles", "response": {"$ref": "Profiles"}}}}',
                true));
        $this->data_mcf                 = new Google_DataMcfServiceResource($this, $this->serviceName, 'mcf',
            json_decode('{"methods": {"get": {"scopes": ["https://www.googleapis.com/auth/analytics.readonly"], "parameters": {"max-results": {"type": "integer", "location": "query", "format": "int32"}, "sort": {"type": "string", "location": "query"}, "dimensions": {"type": "string", "location": "query"}, "start-date": {"required": true, "type": "string", "location": "query"}, "start-index": {"minimum": "1", "type": "integer", "location": "query", "format": "int32"}, "ids": {"required": true, "type": "string", "location": "query"}, "metrics": {"required": true, "type": "string", "location": "query"}, "filters": {"type": "string", "location": "query"}, "end-date": {"required": true, "type": "string", "location": "query"}}, "id": "analytics.data.mcf.get", "httpMethod": "GET", "path": "data/mcf", "response": {"$ref": "McfData"}}}}',
                true));
        $this->data_ga                  = new Google_DataGaServiceResource($this, $this->serviceName, 'ga',
            json_decode('{"methods": {"get": {"scopes": ["https://www.googleapis.com/auth/analytics.readonly"], "parameters": {"max-results": {"type": "integer", "location": "query", "format": "int32"}, "sort": {"type": "string", "location": "query"}, "dimensions": {"type": "string", "location": "query"}, "start-date": {"required": true, "type": "string", "location": "query"}, "start-index": {"minimum": "1", "type": "integer", "location": "query", "format": "int32"}, "segment": {"type": "string", "location": "query"}, "ids": {"required": true, "type": "string", "location": "query"}, "metrics": {"required": true, "type": "string", "location": "query"}, "filters": {"type": "string", "location": "query"}, "end-date": {"required": true, "type": "string", "location": "query"}}, "id": "analytics.data.ga.get", "httpMethod": "GET", "path": "data/ga", "response": {"$ref": "GaData"}}}}',
                true));

    }
}

class Google_Account extends Google_Model
{
    public $kind;
    public $name;
    public $created;
    public $updated;
    public $childLink;
    public $id;
    public $selfLink;
    protected $__childLinkType = 'Google_AccountChildLink';
    protected $__childLinkDataType = '';

    public function getKind()
    {
        return $this->kind;
    }

    public function setKind($kind)
    {
        $this->kind = $kind;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getCreated()
    {
        return $this->created;
    }

    public function setCreated($created)
    {
        $this->created = $created;
    }

    public function getUpdated()
    {
        return $this->updated;
    }

    public function setUpdated($updated)
    {
        $this->updated = $updated;
    }

    public function getChildLink()
    {
        return $this->childLink;
    }

    public function setChildLink(Google_AccountChildLink $childLink)
    {
        $this->childLink = $childLink;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getSelfLink()
    {
        return $this->selfLink;
    }

    public function setSelfLink($selfLink)
    {
        $this->selfLink = $selfLink;
    }
}

class Google_AccountChildLink extends Google_Model
{
    public $href;
    public $type;

    public function getHref()
    {
        return $this->href;
    }

    public function setHref($href)
    {
        $this->href = $href;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;
    }
}

class Google_Accounts extends Google_Model
{
    public $username;
    public $kind;
    public $items;
    public $itemsPerPage;
    public $previousLink;
    public $startIndex;
    public $nextLink;
    public $totalResults;
    protected $__itemsType = 'Google_Account';
    protected $__itemsDataType = 'array';

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getKind()
    {
        return $this->kind;
    }

    public function setKind($kind)
    {
        $this->kind = $kind;
    }

    public function getItems()
    {
        return $this->items;
    }

    public function setItems(/* array(Google_Account) */
        $items
    ) {
        $this->assertIsArray($items, 'Google_Account', __METHOD__);
        $this->items = $items;
    }

    public function getItemsPerPage()
    {
        return $this->itemsPerPage;
    }

    public function setItemsPerPage($itemsPerPage)
    {
        $this->itemsPerPage = $itemsPerPage;
    }

    public function getPreviousLink()
    {
        return $this->previousLink;
    }

    public function setPreviousLink($previousLink)
    {
        $this->previousLink = $previousLink;
    }

    public function getStartIndex()
    {
        return $this->startIndex;
    }

    public function setStartIndex($startIndex)
    {
        $this->startIndex = $startIndex;
    }

    public function getNextLink()
    {
        return $this->nextLink;
    }

    public function setNextLink($nextLink)
    {
        $this->nextLink = $nextLink;
    }

    public function getTotalResults()
    {
        return $this->totalResults;
    }

    public function setTotalResults($totalResults)
    {
        $this->totalResults = $totalResults;
    }
}

class Google_GaData extends Google_Model
{
    public $kind;
    public $rows;
    public $containsSampledData;
    public $totalResults;
    public $itemsPerPage;
    public $totalsForAllResults;
    public $nextLink;
    public $id;
    public $query;
    public $previousLink;
    public $profileInfo;
    public $columnHeaders;
    public $selfLink;
    protected $__queryType = 'Google_GaDataQuery';
    protected $__queryDataType = '';
    protected $__profileInfoType = 'Google_GaDataProfileInfo';
    protected $__profileInfoDataType = '';
    protected $__columnHeadersType = 'Google_GaDataColumnHeaders';
    protected $__columnHeadersDataType = 'array';

    public function getKind()
    {
        return $this->kind;
    }

    public function setKind($kind)
    {
        $this->kind = $kind;
    }

    public function getRows()
    {
        return $this->rows;
    }

    public function setRows(/* array(Google_string) */
        $rows
    ) {
        $this->assertIsArray($rows, 'Google_string', __METHOD__);
        $this->rows = $rows;
    }

    public function getContainsSampledData()
    {
        return $this->containsSampledData;
    }

    public function setContainsSampledData($containsSampledData)
    {
        $this->containsSampledData = $containsSampledData;
    }

    public function getTotalResults()
    {
        return $this->totalResults;
    }

    public function setTotalResults($totalResults)
    {
        $this->totalResults = $totalResults;
    }

    public function getItemsPerPage()
    {
        return $this->itemsPerPage;
    }

    public function setItemsPerPage($itemsPerPage)
    {
        $this->itemsPerPage = $itemsPerPage;
    }

    public function getTotalsForAllResults()
    {
        return $this->totalsForAllResults;
    }

    public function setTotalsForAllResults($totalsForAllResults)
    {
        $this->totalsForAllResults = $totalsForAllResults;
    }

    public function getNextLink()
    {
        return $this->nextLink;
    }

    public function setNextLink($nextLink)
    {
        $this->nextLink = $nextLink;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getQuery()
    {
        return $this->query;
    }

    public function setQuery(Google_GaDataQuery $query)
    {
        $this->query = $query;
    }

    public function getPreviousLink()
    {
        return $this->previousLink;
    }

    public function setPreviousLink($previousLink)
    {
        $this->previousLink = $previousLink;
    }

    public function getProfileInfo()
    {
        return $this->profileInfo;
    }

    public function setProfileInfo(Google_GaDataProfileInfo $profileInfo)
    {
        $this->profileInfo = $profileInfo;
    }

    public function getColumnHeaders()
    {
        return $this->columnHeaders;
    }

    public function setColumnHeaders(/* array(Google_GaDataColumnHeaders) */
        $columnHeaders
    ) {
        $this->assertIsArray($columnHeaders, 'Google_GaDataColumnHeaders', __METHOD__);
        $this->columnHeaders = $columnHeaders;
    }

    public function getSelfLink()
    {
        return $this->selfLink;
    }

    public function setSelfLink($selfLink)
    {
        $this->selfLink = $selfLink;
    }
}

class Google_GaDataColumnHeaders extends Google_Model
{
    public $dataType;
    public $columnType;
    public $name;

    public function getDataType()
    {
        return $this->dataType;
    }

    public function setDataType($dataType)
    {
        $this->dataType = $dataType;
    }

    public function getColumnType()
    {
        return $this->columnType;
    }

    public function setColumnType($columnType)
    {
        $this->columnType = $columnType;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }
}

class Google_GaDataProfileInfo extends Google_Model
{
    public $webPropertyId;
    public $internalWebPropertyId;
    public $tableId;
    public $profileId;
    public $profileName;
    public $accountId;

    public function getWebPropertyId()
    {
        return $this->webPropertyId;
    }

    public function setWebPropertyId($webPropertyId)
    {
        $this->webPropertyId = $webPropertyId;
    }

    public function getInternalWebPropertyId()
    {
        return $this->internalWebPropertyId;
    }

    public function setInternalWebPropertyId($internalWebPropertyId)
    {
        $this->internalWebPropertyId = $internalWebPropertyId;
    }

    public function getTableId()
    {
        return $this->tableId;
    }

    public function setTableId($tableId)
    {
        $this->tableId = $tableId;
    }

    public function getProfileId()
    {
        return $this->profileId;
    }

    public function setProfileId($profileId)
    {
        $this->profileId = $profileId;
    }

    public function getProfileName()
    {
        return $this->profileName;
    }

    public function setProfileName($profileName)
    {
        $this->profileName = $profileName;
    }

    public function getAccountId()
    {
        return $this->accountId;
    }

    public function setAccountId($accountId)
    {
        $this->accountId = $accountId;
    }
}

class Google_GaDataQuery extends Google_Model
{
    public $max_results;
    public $sort;
    public $dimensions;
    public $start_date;
    public $start_index;
    public $segment;
    public $ids;
    public $metrics;
    public $filters;
    public $end_date;

    public function getMax_results()
    {
        return $this->max_results;
    }

    public function setMax_results($max_results)
    {
        $this->max_results = $max_results;
    }

    public function getSort()
    {
        return $this->sort;
    }

    public function setSort(/* array(Google_string) */
        $sort
    ) {
        $this->assertIsArray($sort, 'Google_string', __METHOD__);
        $this->sort = $sort;
    }

    public function getDimensions()
    {
        return $this->dimensions;
    }

    public function setDimensions($dimensions)
    {
        $this->dimensions = $dimensions;
    }

    public function getStart_date()
    {
        return $this->start_date;
    }

    public function setStart_date($start_date)
    {
        $this->start_date = $start_date;
    }

    public function getStart_index()
    {
        return $this->start_index;
    }

    public function setStart_index($start_index)
    {
        $this->start_index = $start_index;
    }

    public function getSegment()
    {
        return $this->segment;
    }

    public function setSegment($segment)
    {
        $this->segment = $segment;
    }

    public function getIds()
    {
        return $this->ids;
    }

    public function setIds($ids)
    {
        $this->ids = $ids;
    }

    public function getMetrics()
    {
        return $this->metrics;
    }

    public function setMetrics(/* array(Google_string) */
        $metrics
    ) {
        $this->assertIsArray($metrics, 'Google_string', __METHOD__);
        $this->metrics = $metrics;
    }

    public function getFilters()
    {
        return $this->filters;
    }

    public function setFilters($filters)
    {
        $this->filters = $filters;
    }

    public function getEnd_date()
    {
        return $this->end_date;
    }

    public function setEnd_date($end_date)
    {
        $this->end_date = $end_date;
    }
}

class Google_Goal extends Google_Model
{
    public $kind;
    public $visitTimeOnSiteDetails;
    public $name;
    public $created;
    public $urlDestinationDetails;
    public $updated;
    public $value;
    public $visitNumPagesDetails;
    public $internalWebPropertyId;
    public $eventDetails;
    public $webPropertyId;
    public $active;
    public $profileId;
    public $parentLink;
    public $type;
    public $id;
    public $selfLink;
    public $accountId;
    protected $__visitTimeOnSiteDetailsType = 'Google_GoalVisitTimeOnSiteDetails';
    protected $__visitTimeOnSiteDetailsDataType = '';
    protected $__urlDestinationDetailsType = 'Google_GoalUrlDestinationDetails';
    protected $__urlDestinationDetailsDataType = '';
    protected $__visitNumPagesDetailsType = 'Google_GoalVisitNumPagesDetails';
    protected $__visitNumPagesDetailsDataType = '';
    protected $__eventDetailsType = 'Google_GoalEventDetails';
    protected $__eventDetailsDataType = '';
    protected $__parentLinkType = 'Google_GoalParentLink';
    protected $__parentLinkDataType = '';

    public function getKind()
    {
        return $this->kind;
    }

    public function setKind($kind)
    {
        $this->kind = $kind;
    }

    public function getVisitTimeOnSiteDetails()
    {
        return $this->visitTimeOnSiteDetails;
    }

    public function setVisitTimeOnSiteDetails(Google_GoalVisitTimeOnSiteDetails $visitTimeOnSiteDetails)
    {
        $this->visitTimeOnSiteDetails = $visitTimeOnSiteDetails;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getCreated()
    {
        return $this->created;
    }

    public function setCreated($created)
    {
        $this->created = $created;
    }

    public function getUrlDestinationDetails()
    {
        return $this->urlDestinationDetails;
    }

    public function setUrlDestinationDetails(Google_GoalUrlDestinationDetails $urlDestinationDetails)
    {
        $this->urlDestinationDetails = $urlDestinationDetails;
    }

    public function getUpdated()
    {
        return $this->updated;
    }

    public function setUpdated($updated)
    {
        $this->updated = $updated;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function setValue($value)
    {
        $this->value = $value;
    }

    public function getVisitNumPagesDetails()
    {
        return $this->visitNumPagesDetails;
    }

    public function setVisitNumPagesDetails(Google_GoalVisitNumPagesDetails $visitNumPagesDetails)
    {
        $this->visitNumPagesDetails = $visitNumPagesDetails;
    }

    public function getInternalWebPropertyId()
    {
        return $this->internalWebPropertyId;
    }

    public function setInternalWebPropertyId($internalWebPropertyId)
    {
        $this->internalWebPropertyId = $internalWebPropertyId;
    }

    public function getEventDetails()
    {
        return $this->eventDetails;
    }

    public function setEventDetails(Google_GoalEventDetails $eventDetails)
    {
        $this->eventDetails = $eventDetails;
    }

    public function getWebPropertyId()
    {
        return $this->webPropertyId;
    }

    public function setWebPropertyId($webPropertyId)
    {
        $this->webPropertyId = $webPropertyId;
    }

    public function getActive()
    {
        return $this->active;
    }

    public function setActive($active)
    {
        $this->active = $active;
    }

    public function getProfileId()
    {
        return $this->profileId;
    }

    public function setProfileId($profileId)
    {
        $this->profileId = $profileId;
    }

    public function getParentLink()
    {
        return $this->parentLink;
    }

    public function setParentLink(Google_GoalParentLink $parentLink)
    {
        $this->parentLink = $parentLink;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getSelfLink()
    {
        return $this->selfLink;
    }

    public function setSelfLink($selfLink)
    {
        $this->selfLink = $selfLink;
    }

    public function getAccountId()
    {
        return $this->accountId;
    }

    public function setAccountId($accountId)
    {
        $this->accountId = $accountId;
    }
}

class Google_GoalEventDetails extends Google_Model
{
    public $eventConditions;
    public $useEventValue;
    protected $__eventConditionsType = 'Google_GoalEventDetailsEventConditions';
    protected $__eventConditionsDataType = 'array';

    public function getEventConditions()
    {
        return $this->eventConditions;
    }

    public function setEventConditions(/* array(Google_GoalEventDetailsEventConditions) */
        $eventConditions
    ) {
        $this->assertIsArray($eventConditions, 'Google_GoalEventDetailsEventConditions', __METHOD__);
        $this->eventConditions = $eventConditions;
    }

    public function getUseEventValue()
    {
        return $this->useEventValue;
    }

    public function setUseEventValue($useEventValue)
    {
        $this->useEventValue = $useEventValue;
    }
}

class Google_GoalEventDetailsEventConditions extends Google_Model
{
    public $type;
    public $matchType;
    public $expression;
    public $comparisonType;
    public $comparisonValue;

    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function getMatchType()
    {
        return $this->matchType;
    }

    public function setMatchType($matchType)
    {
        $this->matchType = $matchType;
    }

    public function getExpression()
    {
        return $this->expression;
    }

    public function setExpression($expression)
    {
        $this->expression = $expression;
    }

    public function getComparisonType()
    {
        return $this->comparisonType;
    }

    public function setComparisonType($comparisonType)
    {
        $this->comparisonType = $comparisonType;
    }

    public function getComparisonValue()
    {
        return $this->comparisonValue;
    }

    public function setComparisonValue($comparisonValue)
    {
        $this->comparisonValue = $comparisonValue;
    }
}

class Google_GoalParentLink extends Google_Model
{
    public $href;
    public $type;

    public function getHref()
    {
        return $this->href;
    }

    public function setHref($href)
    {
        $this->href = $href;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;
    }
}

class Google_GoalUrlDestinationDetails extends Google_Model
{
    public $url;
    public $caseSensitive;
    public $matchType;
    public $steps;
    public $firstStepRequired;
    protected $__stepsType = 'Google_GoalUrlDestinationDetailsSteps';
    protected $__stepsDataType = 'array';

    public function getUrl()
    {
        return $this->url;
    }

    public function setUrl($url)
    {
        $this->url = $url;
    }

    public function getCaseSensitive()
    {
        return $this->caseSensitive;
    }

    public function setCaseSensitive($caseSensitive)
    {
        $this->caseSensitive = $caseSensitive;
    }

    public function getMatchType()
    {
        return $this->matchType;
    }

    public function setMatchType($matchType)
    {
        $this->matchType = $matchType;
    }

    public function getSteps()
    {
        return $this->steps;
    }

    public function setSteps(/* array(Google_GoalUrlDestinationDetailsSteps) */
        $steps
    ) {
        $this->assertIsArray($steps, 'Google_GoalUrlDestinationDetailsSteps', __METHOD__);
        $this->steps = $steps;
    }

    public function getFirstStepRequired()
    {
        return $this->firstStepRequired;
    }

    public function setFirstStepRequired($firstStepRequired)
    {
        $this->firstStepRequired = $firstStepRequired;
    }
}

class Google_GoalUrlDestinationDetailsSteps extends Google_Model
{
    public $url;
    public $name;
    public $number;

    public function getUrl()
    {
        return $this->url;
    }

    public function setUrl($url)
    {
        $this->url = $url;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getNumber()
    {
        return $this->number;
    }

    public function setNumber($number)
    {
        $this->number = $number;
    }
}

class Google_GoalVisitNumPagesDetails extends Google_Model
{
    public $comparisonType;
    public $comparisonValue;

    public function getComparisonType()
    {
        return $this->comparisonType;
    }

    public function setComparisonType($comparisonType)
    {
        $this->comparisonType = $comparisonType;
    }

    public function getComparisonValue()
    {
        return $this->comparisonValue;
    }

    public function setComparisonValue($comparisonValue)
    {
        $this->comparisonValue = $comparisonValue;
    }
}

class Google_GoalVisitTimeOnSiteDetails extends Google_Model
{
    public $comparisonType;
    public $comparisonValue;

    public function getComparisonType()
    {
        return $this->comparisonType;
    }

    public function setComparisonType($comparisonType)
    {
        $this->comparisonType = $comparisonType;
    }

    public function getComparisonValue()
    {
        return $this->comparisonValue;
    }

    public function setComparisonValue($comparisonValue)
    {
        $this->comparisonValue = $comparisonValue;
    }
}

class Google_Goals extends Google_Model
{
    public $username;
    public $kind;
    public $items;
    public $itemsPerPage;
    public $previousLink;
    public $startIndex;
    public $nextLink;
    public $totalResults;
    protected $__itemsType = 'Google_Goal';
    protected $__itemsDataType = 'array';

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getKind()
    {
        return $this->kind;
    }

    public function setKind($kind)
    {
        $this->kind = $kind;
    }

    public function getItems()
    {
        return $this->items;
    }

    public function setItems(/* array(Google_Goal) */
        $items
    ) {
        $this->assertIsArray($items, 'Google_Goal', __METHOD__);
        $this->items = $items;
    }

    public function getItemsPerPage()
    {
        return $this->itemsPerPage;
    }

    public function setItemsPerPage($itemsPerPage)
    {
        $this->itemsPerPage = $itemsPerPage;
    }

    public function getPreviousLink()
    {
        return $this->previousLink;
    }

    public function setPreviousLink($previousLink)
    {
        $this->previousLink = $previousLink;
    }

    public function getStartIndex()
    {
        return $this->startIndex;
    }

    public function setStartIndex($startIndex)
    {
        $this->startIndex = $startIndex;
    }

    public function getNextLink()
    {
        return $this->nextLink;
    }

    public function setNextLink($nextLink)
    {
        $this->nextLink = $nextLink;
    }

    public function getTotalResults()
    {
        return $this->totalResults;
    }

    public function setTotalResults($totalResults)
    {
        $this->totalResults = $totalResults;
    }
}

class Google_McfData extends Google_Model
{
    public $kind;
    public $rows;
    public $containsSampledData;
    public $totalResults;
    public $itemsPerPage;
    public $totalsForAllResults;
    public $nextLink;
    public $id;
    public $query;
    public $previousLink;
    public $profileInfo;
    public $columnHeaders;
    public $selfLink;
    protected $__rowsType = 'Google_McfDataRows';
    protected $__rowsDataType = 'array';
    protected $__queryType = 'Google_McfDataQuery';
    protected $__queryDataType = '';
    protected $__profileInfoType = 'Google_McfDataProfileInfo';
    protected $__profileInfoDataType = '';
    protected $__columnHeadersType = 'Google_McfDataColumnHeaders';
    protected $__columnHeadersDataType = 'array';

    public function getKind()
    {
        return $this->kind;
    }

    public function setKind($kind)
    {
        $this->kind = $kind;
    }

    public function getRows()
    {
        return $this->rows;
    }

    public function setRows(/* array(Google_McfDataRows) */
        $rows
    ) {
        $this->assertIsArray($rows, 'Google_McfDataRows', __METHOD__);
        $this->rows = $rows;
    }

    public function getContainsSampledData()
    {
        return $this->containsSampledData;
    }

    public function setContainsSampledData($containsSampledData)
    {
        $this->containsSampledData = $containsSampledData;
    }

    public function getTotalResults()
    {
        return $this->totalResults;
    }

    public function setTotalResults($totalResults)
    {
        $this->totalResults = $totalResults;
    }

    public function getItemsPerPage()
    {
        return $this->itemsPerPage;
    }

    public function setItemsPerPage($itemsPerPage)
    {
        $this->itemsPerPage = $itemsPerPage;
    }

    public function getTotalsForAllResults()
    {
        return $this->totalsForAllResults;
    }

    public function setTotalsForAllResults($totalsForAllResults)
    {
        $this->totalsForAllResults = $totalsForAllResults;
    }

    public function getNextLink()
    {
        return $this->nextLink;
    }

    public function setNextLink($nextLink)
    {
        $this->nextLink = $nextLink;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getQuery()
    {
        return $this->query;
    }

    public function setQuery(Google_McfDataQuery $query)
    {
        $this->query = $query;
    }

    public function getPreviousLink()
    {
        return $this->previousLink;
    }

    public function setPreviousLink($previousLink)
    {
        $this->previousLink = $previousLink;
    }

    public function getProfileInfo()
    {
        return $this->profileInfo;
    }

    public function setProfileInfo(Google_McfDataProfileInfo $profileInfo)
    {
        $this->profileInfo = $profileInfo;
    }

    public function getColumnHeaders()
    {
        return $this->columnHeaders;
    }

    public function setColumnHeaders(/* array(Google_McfDataColumnHeaders) */
        $columnHeaders
    ) {
        $this->assertIsArray($columnHeaders, 'Google_McfDataColumnHeaders', __METHOD__);
        $this->columnHeaders = $columnHeaders;
    }

    public function getSelfLink()
    {
        return $this->selfLink;
    }

    public function setSelfLink($selfLink)
    {
        $this->selfLink = $selfLink;
    }
}

class Google_McfDataColumnHeaders extends Google_Model
{
    public $dataType;
    public $columnType;
    public $name;

    public function getDataType()
    {
        return $this->dataType;
    }

    public function setDataType($dataType)
    {
        $this->dataType = $dataType;
    }

    public function getColumnType()
    {
        return $this->columnType;
    }

    public function setColumnType($columnType)
    {
        $this->columnType = $columnType;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }
}

class Google_McfDataProfileInfo extends Google_Model
{
    public $webPropertyId;
    public $internalWebPropertyId;
    public $tableId;
    public $profileId;
    public $profileName;
    public $accountId;

    public function getWebPropertyId()
    {
        return $this->webPropertyId;
    }

    public function setWebPropertyId($webPropertyId)
    {
        $this->webPropertyId = $webPropertyId;
    }

    public function getInternalWebPropertyId()
    {
        return $this->internalWebPropertyId;
    }

    public function setInternalWebPropertyId($internalWebPropertyId)
    {
        $this->internalWebPropertyId = $internalWebPropertyId;
    }

    public function getTableId()
    {
        return $this->tableId;
    }

    public function setTableId($tableId)
    {
        $this->tableId = $tableId;
    }

    public function getProfileId()
    {
        return $this->profileId;
    }

    public function setProfileId($profileId)
    {
        $this->profileId = $profileId;
    }

    public function getProfileName()
    {
        return $this->profileName;
    }

    public function setProfileName($profileName)
    {
        $this->profileName = $profileName;
    }

    public function getAccountId()
    {
        return $this->accountId;
    }

    public function setAccountId($accountId)
    {
        $this->accountId = $accountId;
    }
}

class Google_McfDataQuery extends Google_Model
{
    public $max_results;
    public $sort;
    public $dimensions;
    public $start_date;
    public $start_index;
    public $segment;
    public $ids;
    public $metrics;
    public $filters;
    public $end_date;

    public function getMax_results()
    {
        return $this->max_results;
    }

    public function setMax_results($max_results)
    {
        $this->max_results = $max_results;
    }

    public function getSort()
    {
        return $this->sort;
    }

    public function setSort(/* array(Google_string) */
        $sort
    ) {
        $this->assertIsArray($sort, 'Google_string', __METHOD__);
        $this->sort = $sort;
    }

    public function getDimensions()
    {
        return $this->dimensions;
    }

    public function setDimensions($dimensions)
    {
        $this->dimensions = $dimensions;
    }

    public function getStart_date()
    {
        return $this->start_date;
    }

    public function setStart_date($start_date)
    {
        $this->start_date = $start_date;
    }

    public function getStart_index()
    {
        return $this->start_index;
    }

    public function setStart_index($start_index)
    {
        $this->start_index = $start_index;
    }

    public function getSegment()
    {
        return $this->segment;
    }

    public function setSegment($segment)
    {
        $this->segment = $segment;
    }

    public function getIds()
    {
        return $this->ids;
    }

    public function setIds($ids)
    {
        $this->ids = $ids;
    }

    public function getMetrics()
    {
        return $this->metrics;
    }

    public function setMetrics(/* array(Google_string) */
        $metrics
    ) {
        $this->assertIsArray($metrics, 'Google_string', __METHOD__);
        $this->metrics = $metrics;
    }

    public function getFilters()
    {
        return $this->filters;
    }

    public function setFilters($filters)
    {
        $this->filters = $filters;
    }

    public function getEnd_date()
    {
        return $this->end_date;
    }

    public function setEnd_date($end_date)
    {
        $this->end_date = $end_date;
    }
}

class Google_McfDataRows extends Google_Model
{
    public $primitiveValue;
    public $conversionPathValue;
    protected $__conversionPathValueType = 'Google_McfDataRowsConversionPathValue';
    protected $__conversionPathValueDataType = 'array';

    public function getPrimitiveValue()
    {
        return $this->primitiveValue;
    }

    public function setPrimitiveValue($primitiveValue)
    {
        $this->primitiveValue = $primitiveValue;
    }

    public function getConversionPathValue()
    {
        return $this->conversionPathValue;
    }

    public function setConversionPathValue(/* array(Google_McfDataRowsConversionPathValue) */
        $conversionPathValue
    ) {
        $this->assertIsArray($conversionPathValue, 'Google_McfDataRowsConversionPathValue', __METHOD__);
        $this->conversionPathValue = $conversionPathValue;
    }
}

class Google_McfDataRowsConversionPathValue extends Google_Model
{
    public $nodeValue;
    public $interactionType;

    public function getNodeValue()
    {
        return $this->nodeValue;
    }

    public function setNodeValue($nodeValue)
    {
        $this->nodeValue = $nodeValue;
    }

    public function getInteractionType()
    {
        return $this->interactionType;
    }

    public function setInteractionType($interactionType)
    {
        $this->interactionType = $interactionType;
    }
}

class Google_Profile extends Google_Model
{
    public $defaultPage;
    public $kind;
    public $excludeQueryParameters;
    public $name;
    public $created;
    public $webPropertyId;
    public $updated;
    public $siteSearchQueryParameters;
    public $currency;
    public $internalWebPropertyId;
    public $childLink;
    public $timezone;
    public $siteSearchCategoryParameters;
    public $parentLink;
    public $id;
    public $selfLink;
    public $accountId;
    protected $__childLinkType = 'Google_ProfileChildLink';
    protected $__childLinkDataType = '';
    protected $__parentLinkType = 'Google_ProfileParentLink';
    protected $__parentLinkDataType = '';

    public function getDefaultPage()
    {
        return $this->defaultPage;
    }

    public function setDefaultPage($defaultPage)
    {
        $this->defaultPage = $defaultPage;
    }

    public function getKind()
    {
        return $this->kind;
    }

    public function setKind($kind)
    {
        $this->kind = $kind;
    }

    public function getExcludeQueryParameters()
    {
        return $this->excludeQueryParameters;
    }

    public function setExcludeQueryParameters($excludeQueryParameters)
    {
        $this->excludeQueryParameters = $excludeQueryParameters;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getCreated()
    {
        return $this->created;
    }

    public function setCreated($created)
    {
        $this->created = $created;
    }

    public function getWebPropertyId()
    {
        return $this->webPropertyId;
    }

    public function setWebPropertyId($webPropertyId)
    {
        $this->webPropertyId = $webPropertyId;
    }

    public function getUpdated()
    {
        return $this->updated;
    }

    public function setUpdated($updated)
    {
        $this->updated = $updated;
    }

    public function getSiteSearchQueryParameters()
    {
        return $this->siteSearchQueryParameters;
    }

    public function setSiteSearchQueryParameters($siteSearchQueryParameters)
    {
        $this->siteSearchQueryParameters = $siteSearchQueryParameters;
    }

    public function getCurrency()
    {
        return $this->currency;
    }

    public function setCurrency($currency)
    {
        $this->currency = $currency;
    }

    public function getInternalWebPropertyId()
    {
        return $this->internalWebPropertyId;
    }

    public function setInternalWebPropertyId($internalWebPropertyId)
    {
        $this->internalWebPropertyId = $internalWebPropertyId;
    }

    public function getChildLink()
    {
        return $this->childLink;
    }

    public function setChildLink(Google_ProfileChildLink $childLink)
    {
        $this->childLink = $childLink;
    }

    public function getTimezone()
    {
        return $this->timezone;
    }

    public function setTimezone($timezone)
    {
        $this->timezone = $timezone;
    }

    public function getSiteSearchCategoryParameters()
    {
        return $this->siteSearchCategoryParameters;
    }

    public function setSiteSearchCategoryParameters($siteSearchCategoryParameters)
    {
        $this->siteSearchCategoryParameters = $siteSearchCategoryParameters;
    }

    public function getParentLink()
    {
        return $this->parentLink;
    }

    public function setParentLink(Google_ProfileParentLink $parentLink)
    {
        $this->parentLink = $parentLink;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getSelfLink()
    {
        return $this->selfLink;
    }

    public function setSelfLink($selfLink)
    {
        $this->selfLink = $selfLink;
    }

    public function getAccountId()
    {
        return $this->accountId;
    }

    public function setAccountId($accountId)
    {
        $this->accountId = $accountId;
    }
}

class Google_ProfileChildLink extends Google_Model
{
    public $href;
    public $type;

    public function getHref()
    {
        return $this->href;
    }

    public function setHref($href)
    {
        $this->href = $href;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;
    }
}

class Google_ProfileParentLink extends Google_Model
{
    public $href;
    public $type;

    public function getHref()
    {
        return $this->href;
    }

    public function setHref($href)
    {
        $this->href = $href;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;
    }
}

class Google_Profiles extends Google_Model
{
    public $username;
    public $kind;
    public $items;
    public $itemsPerPage;
    public $previousLink;
    public $startIndex;
    public $nextLink;
    public $totalResults;
    protected $__itemsType = 'Google_Profile';
    protected $__itemsDataType = 'array';

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getKind()
    {
        return $this->kind;
    }

    public function setKind($kind)
    {
        $this->kind = $kind;
    }

    public function getItems()
    {
        return $this->items;
    }

    public function setItems(/* array(Google_Profile) */
        $items
    ) {
        $this->assertIsArray($items, 'Google_Profile', __METHOD__);
        $this->items = $items;
    }

    public function getItemsPerPage()
    {
        return $this->itemsPerPage;
    }

    public function setItemsPerPage($itemsPerPage)
    {
        $this->itemsPerPage = $itemsPerPage;
    }

    public function getPreviousLink()
    {
        return $this->previousLink;
    }

    public function setPreviousLink($previousLink)
    {
        $this->previousLink = $previousLink;
    }

    public function getStartIndex()
    {
        return $this->startIndex;
    }

    public function setStartIndex($startIndex)
    {
        $this->startIndex = $startIndex;
    }

    public function getNextLink()
    {
        return $this->nextLink;
    }

    public function setNextLink($nextLink)
    {
        $this->nextLink = $nextLink;
    }

    public function getTotalResults()
    {
        return $this->totalResults;
    }

    public function setTotalResults($totalResults)
    {
        $this->totalResults = $totalResults;
    }
}

class Google_Segment extends Google_Model
{
    public $definition;
    public $kind;
    public $segmentId;
    public $created;
    public $updated;
    public $id;
    public $selfLink;
    public $name;

    public function getDefinition()
    {
        return $this->definition;
    }

    public function setDefinition($definition)
    {
        $this->definition = $definition;
    }

    public function getKind()
    {
        return $this->kind;
    }

    public function setKind($kind)
    {
        $this->kind = $kind;
    }

    public function getSegmentId()
    {
        return $this->segmentId;
    }

    public function setSegmentId($segmentId)
    {
        $this->segmentId = $segmentId;
    }

    public function getCreated()
    {
        return $this->created;
    }

    public function setCreated($created)
    {
        $this->created = $created;
    }

    public function getUpdated()
    {
        return $this->updated;
    }

    public function setUpdated($updated)
    {
        $this->updated = $updated;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getSelfLink()
    {
        return $this->selfLink;
    }

    public function setSelfLink($selfLink)
    {
        $this->selfLink = $selfLink;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }
}

class Google_Segments extends Google_Model
{
    public $username;
    public $kind;
    public $items;
    public $itemsPerPage;
    public $previousLink;
    public $startIndex;
    public $nextLink;
    public $totalResults;
    protected $__itemsType = 'Google_Segment';
    protected $__itemsDataType = 'array';

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getKind()
    {
        return $this->kind;
    }

    public function setKind($kind)
    {
        $this->kind = $kind;
    }

    public function getItems()
    {
        return $this->items;
    }

    public function setItems(/* array(Google_Segment) */
        $items
    ) {
        $this->assertIsArray($items, 'Google_Segment', __METHOD__);
        $this->items = $items;
    }

    public function getItemsPerPage()
    {
        return $this->itemsPerPage;
    }

    public function setItemsPerPage($itemsPerPage)
    {
        $this->itemsPerPage = $itemsPerPage;
    }

    public function getPreviousLink()
    {
        return $this->previousLink;
    }

    public function setPreviousLink($previousLink)
    {
        $this->previousLink = $previousLink;
    }

    public function getStartIndex()
    {
        return $this->startIndex;
    }

    public function setStartIndex($startIndex)
    {
        $this->startIndex = $startIndex;
    }

    public function getNextLink()
    {
        return $this->nextLink;
    }

    public function setNextLink($nextLink)
    {
        $this->nextLink = $nextLink;
    }

    public function getTotalResults()
    {
        return $this->totalResults;
    }

    public function setTotalResults($totalResults)
    {
        $this->totalResults = $totalResults;
    }
}

class Google_Webproperties extends Google_Model
{
    public $username;
    public $kind;
    public $items;
    public $itemsPerPage;
    public $previousLink;
    public $startIndex;
    public $nextLink;
    public $totalResults;
    protected $__itemsType = 'Google_Webproperty';
    protected $__itemsDataType = 'array';

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getKind()
    {
        return $this->kind;
    }

    public function setKind($kind)
    {
        $this->kind = $kind;
    }

    public function getItems()
    {
        return $this->items;
    }

    public function setItems(/* array(Google_Webproperty) */
        $items
    ) {
        $this->assertIsArray($items, 'Google_Webproperty', __METHOD__);
        $this->items = $items;
    }

    public function getItemsPerPage()
    {
        return $this->itemsPerPage;
    }

    public function setItemsPerPage($itemsPerPage)
    {
        $this->itemsPerPage = $itemsPerPage;
    }

    public function getPreviousLink()
    {
        return $this->previousLink;
    }

    public function setPreviousLink($previousLink)
    {
        $this->previousLink = $previousLink;
    }

    public function getStartIndex()
    {
        return $this->startIndex;
    }

    public function setStartIndex($startIndex)
    {
        $this->startIndex = $startIndex;
    }

    public function getNextLink()
    {
        return $this->nextLink;
    }

    public function setNextLink($nextLink)
    {
        $this->nextLink = $nextLink;
    }

    public function getTotalResults()
    {
        return $this->totalResults;
    }

    public function setTotalResults($totalResults)
    {
        $this->totalResults = $totalResults;
    }
}

class Google_Webproperty extends Google_Model
{
    public $kind;
    public $name;
    public $created;
    public $updated;
    public $websiteUrl;
    public $internalWebPropertyId;
    public $childLink;
    public $parentLink;
    public $id;
    public $selfLink;
    public $accountId;
    protected $__childLinkType = 'Google_WebpropertyChildLink';
    protected $__childLinkDataType = '';
    protected $__parentLinkType = 'Google_WebpropertyParentLink';
    protected $__parentLinkDataType = '';

    public function getKind()
    {
        return $this->kind;
    }

    public function setKind($kind)
    {
        $this->kind = $kind;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getCreated()
    {
        return $this->created;
    }

    public function setCreated($created)
    {
        $this->created = $created;
    }

    public function getUpdated()
    {
        return $this->updated;
    }

    public function setUpdated($updated)
    {
        $this->updated = $updated;
    }

    public function getWebsiteUrl()
    {
        return $this->websiteUrl;
    }

    public function setWebsiteUrl($websiteUrl)
    {
        $this->websiteUrl = $websiteUrl;
    }

    public function getInternalWebPropertyId()
    {
        return $this->internalWebPropertyId;
    }

    public function setInternalWebPropertyId($internalWebPropertyId)
    {
        $this->internalWebPropertyId = $internalWebPropertyId;
    }

    public function getChildLink()
    {
        return $this->childLink;
    }

    public function setChildLink(Google_WebpropertyChildLink $childLink)
    {
        $this->childLink = $childLink;
    }

    public function getParentLink()
    {
        return $this->parentLink;
    }

    public function setParentLink(Google_WebpropertyParentLink $parentLink)
    {
        $this->parentLink = $parentLink;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getSelfLink()
    {
        return $this->selfLink;
    }

    public function setSelfLink($selfLink)
    {
        $this->selfLink = $selfLink;
    }

    public function getAccountId()
    {
        return $this->accountId;
    }

    public function setAccountId($accountId)
    {
        $this->accountId = $accountId;
    }
}

class Google_WebpropertyChildLink extends Google_Model
{
    public $href;
    public $type;

    public function getHref()
    {
        return $this->href;
    }

    public function setHref($href)
    {
        $this->href = $href;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;
    }
}

class Google_WebpropertyParentLink extends Google_Model
{
    public $href;
    public $type;

    public function getHref()
    {
        return $this->href;
    }

    public function setHref($href)
    {
        $this->href = $href;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;
    }
}
