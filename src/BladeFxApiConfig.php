<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi;

class BladeFxApiConfig
{
    /**
     * Specification:
     * - List of headers used in all BladeFx requests.
     *
     * @var array<string, string>
     */
    private const COMMON_API_REQUEST_HEADERS = [
        'Content-Type' => 'application/json',
    ];

    /**
     * @var string
     */
    public const LOG_MESSAGE_PREFIX = 'BladeFxAPIClient: ';

    /**
     * @var string
     */
    public const DEFAULT_BLADE_FX_REPORTS_HOST = 'https://api.alabama.blade-fx.com';

    /**
     * @var string
     */
    public const AUTHENTICATE_USER_API_RESOURCE = '/api/Users/authenticate';

    /**
     * @var string
     */
    public const GET_CATEGORIES_LIST_API_RESOURCE = '/api/ReportData/GetCategoryList';

    /**
     * @var string
     */
    public const GET_REPORTS_LIST_API_RESOURCE = '/api/ReportData/GetReportList';

    /**
     * @var string
     */
    public const GET_REPORT_PREVIEW_API_RESOURCE = '/api/ReportData/GetEncryptedData';

    /**
     * @var string
     */
    public const SET_FAVORITE_REPORT_API_RESOURCE = '/api/ReportData/SetFavoriteReport';

    /**
     * @var string
     */
    public const GET_REPORT_PARAMETER_FORM_API_RESOURCE = '/api/ReportData/GetReportURL';

    /**
     * @var string
     */
    public const GET_CREATE_OR_UPDATE_USER_ON_BFX_API_RESOURCE = '/api/Users/SetUser';

    /**
     * @var string
     */
    public const GET_UPDATE_PASSWORD_API_RESOURCE = '/api/Users/UserSetNewPwdClean';

    /**
     * @var string
     */
    public const USER_CREATE_UPDATE_DELETE_FAILED_GENERAL_ERROR = "There's been an issue with updating the user on BladeFx, please try again at a later time";

    /**
     * @var array<string, int>
     */
    public const KEYS_TO_CHANGE_FROM_CAMEL_CASE = [
        'repId' => 1,
        'layoutId' => 1,
        'paramId' => 1,
        'hostAddress' => 1,
        'userId' => 1,
        'connId' => 1,
    ];

    /**
     * @var string
     */
    public const AUTH_TOKEN_FILE_PATH = '/tmp/api_token.json';

    /**
     * @var string
     */
    public const AUTH_TOKEN_EXPIRES_AT_SECONDS_DURATION = '+3600 seconds';

    /**
     * @return string
     */
    public function getDefaultApiBaseUri(): string
    {
        return self::DEFAULT_BLADE_FX_REPORTS_HOST;
    }

    /**
     * @return array<string>
     */
    public function getCommonApiRequestHeaders(): array
    {
        return self::COMMON_API_REQUEST_HEADERS;
    }

    /**
     * @return string
     */
    public function getAuthenticationUserResourceParameter(): string
    {
        return static::AUTHENTICATE_USER_API_RESOURCE;
    }

    /**
     * @return string
     */
    public function getCategoriesListResourceParameter(): string
    {
        return static::GET_CATEGORIES_LIST_API_RESOURCE;
    }

    /**
     * @return string
     */
    public function getReportsListResourceParameter(): string
    {
        return static::GET_REPORTS_LIST_API_RESOURCE;
    }

    /**
     * @return string
     */
    public function getSetFavoriteReportResourceParameter(): string
    {
        return static::SET_FAVORITE_REPORT_API_RESOURCE;
    }

    /**
     * @return string
     */
    public function getCreateOrUpdateUserOnBfxResourceParameter(): string
    {
        return static::GET_CREATE_OR_UPDATE_USER_ON_BFX_API_RESOURCE;
    }

    /**
     * @return string
     */
    public function getUpdatePasswordOnBladeFxResourceParameter(): string
    {
        return static::GET_UPDATE_PASSWORD_API_RESOURCE;
    }

    /**
     * @return string
     */
    public function getReportPreviewResourceParameter(): string
    {
        return static::GET_REPORT_PREVIEW_API_RESOURCE;
    }

    /**
     * @return string
     */
    public function getReportParamFormResourceParameter(): string
    {
        return static::GET_REPORT_PARAMETER_FORM_API_RESOURCE;
    }

    /**
     * @return array<int>
     */
    public function getKeysToChangeFromCamelCaseToSnakeCase(): array
    {
        return static::KEYS_TO_CHANGE_FROM_CAMEL_CASE;
    }
}
