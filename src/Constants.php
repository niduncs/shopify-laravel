<?php

namespace ShopifyLaravel;

class Constants
{
    // Error messages
    const CONFIG_VALUES_MISSING = "ShopifyConfig is missing some values: Please fix yo' shit";
    const API_NOT_CONFIGURED = "API is not configured properly";

    // Header values
    const SHOPIFY_AUTH_HEADER = "X-Shopify-Access-Token";
    const SHOPIFY_SHOP_TEMPLATE = "https://{shop}.myshopify.com";

    // Other
    const SHOPIFY_AUTHORIZE_ENDPOINT_TEMPLATE = "https://{shop}.myshopify.com/admin/oauth/authorize?client_id={api_key}&amp;scope={scopes}&amp;redirect_uri={redirect_uri}&amp;state={nonce}&amp;grant_options[]={option}";
    const ENDPOINTS_CLASS_LOCATION_TEMPLATE = "ShopifyLaravel\\Endpoints\\:endpoint";
}
