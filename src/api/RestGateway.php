<?php

namespace AAM\Payment\Api;

require_once('./Transaction.php');

class RestGateway
{
    /**
     * RestGateway Class: A library of functions used to call the REST API web service.
     * This class is required for every PHP web page making a call to 1stPay REST API.
     * This class/file contains all allowed executable methods.
     * Please refer to the gateway documentation web page for specifics on what parameters to use for each call.
     * Last modified: 6/23/2016
     * @version 1.2.0
     *
     *
     */

    public $Result = array();
    public $Status = "";
    private $Url = "https://secure.1stpaygateway.net/secure/RestGW/Gateway/Transaction/";
    private $TestMode = false;
    private $Version = "1.2.0";

    public function __construct()
    {
    }

    public function SwitchEnv()
    {
        // Switch between production and validation
        if ($this->Url == "https://secure.1stpaygateway.net/secure/RestGW/Gateway/Transaction/") {
            $this->Url = "https://secure-v.goemerchant.com/secure/RestGW/Gateway/Transaction/";
            $this->TestMode = true;
            return true;
        } elseif ($this->Url == "https://secure-v.goemerchant.com/secure/RestGW/Gateway/Transaction/") {
            $this->Url = "https://secure.1stpaygateway.net/secure/RestGW/Gateway/Transaction/";
            $this->TestMode = false;
            return true;
        } else {
            $this->Url = "https://secure.1stpaygateway.net/secure/RestGW/Gateway/Transaction/";
            $this->TestMode = false;
            return true;
        }
    }

    public function GetResult()
    {
        return $this->Result;
    }

    public function createAuth($transactionData, $callBackSuccess = null, $callBackFailure = null)
    {
        $apiRequest = $this->Url . "Auth";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->Status >= 500 && $this->Status <= 599 && isset($callBackFailure)) {
            call_user_func($callBackFailure);
        }
        if ($this->Status >= 400 && $this->Status <= 499 && isset($callBackFailure)) {
            call_user_func($callBackFailure);
        }
        if ($this->Status >= 200 && $this->Status <= 299 && isset($callBackSuccess)) {
            call_user_func($callBackSuccess);
        }
    }
    public function createAuthUsing1stPayVault($transactionData, $callBackSuccess = null, $callBackFailure = null)
    {
        $apiRequest = $this->Url . "AuthUsingVault";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->Status >= 500 && $this->Status <= 599 && isset($callBackFailure)) {
            call_user_func($callBackFailure);
        }
        if ($this->Status >= 400 && $this->Status <= 499 && isset($callBackFailure)) {
            call_user_func($callBackFailure);
        }
        if ($this->Status >= 200 && $this->Status <= 299 && isset($callBackSuccess)) {
            call_user_func($callBackSuccess);
        }
    }
    public function closeBatch($transactionData, $callBackSuccess = null, $callBackFailure = null)
    {
        $apiRequest = $this->Url . "CloseBatch";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->Status >= 500 && $this->Status <= 599 && isset($callBackFailure)) {
            call_user_func($callBackFailure);
        }
        if ($this->Status >= 400 && $this->Status <= 499 && isset($callBackFailure)) {
            call_user_func($callBackFailure);
        }
        if ($this->Status >= 200 && $this->Status <= 299 && isset($callBackSuccess)) {
            call_user_func($callBackSuccess);
        }
    }
    public function createCredit($transactionData, $callBackSuccess = null, $callBackFailure = null)
    {
        $apiRequest = $this->Url . "Credit";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->Status >= 500 && $this->Status <= 599 && isset($callBackFailure)) {
            call_user_func($callBackFailure);
        }
        if ($this->Status >= 400 && $this->Status <= 499 && isset($callBackFailure)) {
            call_user_func($callBackFailure);
        }
        if ($this->Status >= 200 && $this->Status <= 299 && isset($callBackSuccess)) {
            call_user_func($callBackSuccess);
        }
    }
    public function createCreditRetailOnly($transactionData, $callBackSuccess = null, $callBackFailure = null)
    {
        $apiRequest = $this->Url . "CreditRetailOnly";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->Status >= 500 && $this->Status <= 599 && isset($callBackFailure)) {
            call_user_func($callBackFailure);
        }
        if ($this->Status >= 400 && $this->Status <= 499 && isset($callBackFailure)) {
            call_user_func($callBackFailure);
        }
        if ($this->Status >= 200 && $this->Status <= 299 && isset($callBackSuccess)) {
            call_user_func($callBackSuccess);
        }
    }
    public function createCreditRetailOnlyUsing1stPayVault(
        $transactionData,
        $callBackSuccess = null,
        $callBackFailure = null
    ) {
        $apiRequest = $this->Url . "CreditRetailOnlyUsingVault";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->Status >= 500 && $this->Status <= 599 && isset($callBackFailure)) {
            call_user_func($callBackFailure);
        }
        if ($this->Status >= 400 && $this->Status <= 499 && isset($callBackFailure)) {
            call_user_func($callBackFailure);
        }
        if ($this->Status >= 200 && $this->Status <= 299 && isset($callBackSuccess)) {
            call_user_func($callBackSuccess);
        }
    }
    public function query($transactionData, $callBackSuccess = null, $callBackFailure = null)
    {
        $apiRequest = $this->Url . "Query";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->Status >= 500 && $this->Status <= 599 && isset($callBackFailure)) {
            call_user_func($callBackFailure);
        }
        if ($this->Status >= 400 && $this->Status <= 499 && isset($callBackFailure)) {
            call_user_func($callBackFailure);
        }
        if ($this->Status >= 200 && $this->Status <= 299 && isset($callBackSuccess)) {
            call_user_func($callBackSuccess);
        }
    }
    public function createSale($transactionData, $callBackSuccess = null, $callBackFailure = null)
    {
        $apiRequest = $this->Url . "Sale";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->Status >= 500 && $this->Status <= 599 && isset($callBackFailure)) {
            call_user_func($callBackFailure);
        }
        if ($this->Status >= 400 && $this->Status <= 499 && isset($callBackFailure)) {
            call_user_func($callBackFailure);
        }
        if ($this->Status >= 200 && $this->Status <= 299 && isset($callBackSuccess)) {
            call_user_func($callBackSuccess);
        }
    }
    public function createSaleUsing1stPayVault($transactionData, $callBackSuccess = null, $callBackFailure = null)
    {
        $apiRequest = $this->Url . "SaleUsingVault";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->Status >= 500 && $this->Status <= 599 && isset($callBackFailure)) {
            call_user_func($callBackFailure);
        }
        if ($this->Status >= 400 && $this->Status <= 499 && isset($callBackFailure)) {
            call_user_func($callBackFailure);
        }
        if ($this->Status >= 200 && $this->Status <= 299 && isset($callBackSuccess)) {
            call_user_func($callBackSuccess);
        }
    }
    public function createReAuth($transactionData, $callBackSuccess = null, $callBackFailure = null)
    {
        $apiRequest = $this->Url . "ReAuth";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->Status >= 500 && $this->Status <= 599 && isset($callBackFailure)) {
            call_user_func($callBackFailure);
        }
        if ($this->Status >= 400 && $this->Status <= 499 && isset($callBackFailure)) {
            call_user_func($callBackFailure);
        }
        if ($this->Status >= 200 && $this->Status <= 299 && isset($callBackSuccess)) {
            call_user_func($callBackSuccess);
        }
    }
    public function createReDebit($transactionData, $callBackSuccess = null, $callBackFailure = null)
    {
        $apiRequest = $this->Url . "ReDebit";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->Status >= 500 && $this->Status <= 599 && isset($callBackFailure)) {
            call_user_func($callBackFailure);
        }
        if ($this->Status >= 400 && $this->Status <= 499 && isset($callBackFailure)) {
            call_user_func($callBackFailure);
        }
        if ($this->Status >= 200 && $this->Status <= 299 && isset($callBackSuccess)) {
            call_user_func($callBackSuccess);
        }
    }
    public function createReSale($transactionData, $callBackSuccess = null, $callBackFailure = null)
    {
        $apiRequest = $this->Url . "ReSale";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->Status >= 500 && $this->Status <= 599 && isset($callBackFailure)) {
            call_user_func($callBackFailure);
        }
        if ($this->Status >= 400 && $this->Status <= 499 && isset($callBackFailure)) {
            call_user_func($callBackFailure);
        }
        if ($this->Status >= 200 && $this->Status <= 299 && isset($callBackSuccess)) {
            call_user_func($callBackSuccess);
        }
    }
    public function performSettle($transactionData, $callBackSuccess = null, $callBackFailure = null)
    {
        $apiRequest = $this->Url . "Settle";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->Status >= 500 && $this->Status <= 599 && isset($callBackFailure)) {
            call_user_func($callBackFailure);
        }
        if ($this->Status >= 400 && $this->Status <= 499 && isset($callBackFailure)) {
            call_user_func($callBackFailure);
        }
        if ($this->Status >= 200 && $this->Status <= 299 && isset($callBackSuccess)) {
            call_user_func($callBackSuccess);
        }
    }
    public function applyTipAdjust($transactionData, $callBackSuccess = null, $callBackFailure = null)
    {
        $apiRequest = $this->Url . "TipAdjust";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->Status >= 500 && $this->Status <= 599 && isset($callBackFailure)) {
            call_user_func($callBackFailure);
        }
        if ($this->Status >= 400 && $this->Status <= 499 && isset($callBackFailure)) {
            call_user_func($callBackFailure);
        }
        if ($this->Status >= 200 && $this->Status <= 299 && isset($callBackSuccess)) {
            call_user_func($callBackSuccess);
        }
    }
    public function performVoid($transactionData, $callBackSuccess = null, $callBackFailure = null)
    {
        $apiRequest = $this->Url . "Void";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->Status >= 500 && $this->Status <= 599 && isset($callBackFailure)) {
            call_user_func($callBackFailure);
        }
        if ($this->Status >= 400 && $this->Status <= 499 && isset($callBackFailure)) {
            call_user_func($callBackFailure);
        }
        if ($this->Status >= 200 && $this->Status <= 299 && isset($callBackSuccess)) {
            call_user_func($callBackSuccess);
        }
    }
    /*************************************************************************************
                                        ACH METHODS
     *************************************************************************************/

    public function performAchVoid($transactionData, $callBackSuccess = null, $callBackFailure = null)
    {
        $apiRequest = $this->Url . "AchVoid";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->Status >= 500 && $this->Status <= 599 && isset($callBackFailure)) {
            call_user_func($callBackFailure);
        }
        if ($this->Status >= 400 && $this->Status <= 499 && isset($callBackFailure)) {
            call_user_func($callBackFailure);
        }
        if ($this->Status >= 200 && $this->Status <= 299 && isset($callBackSuccess)) {
            call_user_func($callBackSuccess);
        }
    }
    public function createAchCredit($transactionData, $callBackSuccess = null, $callBackFailure = null)
    {
        $apiRequest = $this->Url . "AchCredit";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->Status >= 500 && $this->Status <= 599 && isset($callBackFailure)) {
            call_user_func($callBackFailure);
        }
        if ($this->Status >= 400 && $this->Status <= 499 && isset($callBackFailure)) {
            call_user_func($callBackFailure);
        }
        if ($this->Status >= 200 && $this->Status <= 299 && isset($callBackSuccess)) {
            call_user_func($callBackSuccess);
        }
    }
    public function createAchDebit($transactionData, $callBackSuccess = null, $callBackFailure = null)
    {
        $apiRequest = $this->Url . "AchDebit";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->Status >= 500 && $this->Status <= 599 && isset($callBackFailure)) {
            call_user_func($callBackFailure);
        }
        if ($this->Status >= 400 && $this->Status <= 499 && isset($callBackFailure)) {
            call_user_func($callBackFailure);
        }
        if ($this->Status >= 200 && $this->Status <= 299 && isset($callBackSuccess)) {
            call_user_func($callBackSuccess);
        }
    }
    public function createAchCreditUsing1stPayVault($transactionData, $callBackSuccess = null, $callBackFailure = null)
    {
        $apiRequest = $this->Url . "AchCreditUsingVault";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->Status >= 500 && $this->Status <= 599 && isset($callBackFailure)) {
            call_user_func($callBackFailure);
        }
        if ($this->Status >= 400 && $this->Status <= 499 && isset($callBackFailure)) {
            call_user_func($callBackFailure);
        }
        if ($this->Status >= 200 && $this->Status <= 299 && isset($callBackSuccess)) {
            call_user_func($callBackSuccess);
        }
    }
    public function createAchDebitUsing1stPayVault($transactionData, $callBackSuccess = null, $callBackFailure = null)
    {
        $apiRequest = $this->Url . "AchDebitUsingVault";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->Status >= 500 && $this->Status <= 599 && isset($callBackFailure)) {
            call_user_func($callBackFailure);
        }
        if ($this->Status >= 400 && $this->Status <= 499 && isset($callBackFailure)) {
            call_user_func($callBackFailure);
        }
        if ($this->Status >= 200 && $this->Status <= 299 && isset($callBackSuccess)) {
            call_user_func($callBackSuccess);
        }
    }
    public function getAchCategories($transactionData, $callBackSuccess = null, $callBackFailure = null)
    {
        $apiRequest = $this->Url . "AchGetCategories";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->Status >= 500 && $this->Status <= 599 && isset($callBackFailure)) {
            call_user_func($callBackFailure);
        }
        if ($this->Status >= 400 && $this->Status <= 499 && isset($callBackFailure)) {
            call_user_func($callBackFailure);
        }
        if ($this->Status >= 200 && $this->Status <= 299 && isset($callBackSuccess)) {
            call_user_func($callBackSuccess);
        }
    }
    public function createAchCategories($transactionData, $callBackSuccess = null, $callBackFailure = null)
    {
        $apiRequest = $this->Url . "AchCreateCategory";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->Status >= 500 && $this->Status <= 599 && isset($callBackFailure)) {
            call_user_func($callBackFailure);
        }
        if ($this->Status >= 400 && $this->Status <= 499 && isset($callBackFailure)) {
            call_user_func($callBackFailure);
        }
        if ($this->Status >= 200 && $this->Status <= 299 && isset($callBackSuccess)) {
            call_user_func($callBackSuccess);
        }
    }
    public function deleteAchCategories($transactionData, $callBackSuccess = null, $callBackFailure = null)
    {
        $apiRequest = $this->Url . "AchDeleteCategory";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->Status >= 500 && $this->Status <= 599 && isset($callBackFailure)) {
            call_user_func($callBackFailure);
        }
        if ($this->Status >= 400 && $this->Status <= 499 && isset($callBackFailure)) {
            call_user_func($callBackFailure);
        }
        if ($this->Status >= 200 && $this->Status <= 299 && isset($callBackSuccess)) {
            call_user_func($callBackSuccess);
        }
    }
    public function setupAchStore($transactionData, $callBackSuccess = null, $callBackFailure = null)
    {
        $apiRequest = $this->Url . "AchSetupStore";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->Status >= 500 && $this->Status <= 599 && isset($callBackFailure)) {
            call_user_func($callBackFailure);
        }
        if ($this->Status >= 400 && $this->Status <= 499 && isset($callBackFailure)) {
            call_user_func($callBackFailure);
        }
        if ($this->Status >= 200 && $this->Status <= 299 && isset($callBackSuccess)) {
            call_user_func($callBackSuccess);
        }
    }
    /*************************************************************************************
                                        VAULT METHODS
     *************************************************************************************/
    public function createVaultContainer($transactionData, $callBackSuccess = null, $callBackFailure = null)
    {
        $apiRequest = $this->Url . "VaultCreateContainer";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->Status >= 500 && $this->Status <= 599 && isset($callBackFailure)) {
            call_user_func($callBackFailure);
        }
        if ($this->Status >= 400 && $this->Status <= 499 && isset($callBackFailure)) {
            call_user_func($callBackFailure);
        }
        if ($this->Status >= 200 && $this->Status <= 299 && isset($callBackSuccess)) {
            call_user_func($callBackSuccess);
        }
    }
    public function createVaultAchRecord($transactionData, $callBackSuccess = null, $callBackFailure = null)
    {
        $apiRequest = $this->Url . "VaultCreateAchRecord";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->Status >= 500 && $this->Status <= 599 && isset($callBackFailure)) {
            call_user_func($callBackFailure);
        }
        if ($this->Status >= 400 && $this->Status <= 499 && isset($callBackFailure)) {
            call_user_func($callBackFailure);
        }
        if ($this->Status >= 200 && $this->Status <= 299 && isset($callBackSuccess)) {
            call_user_func($callBackSuccess);
        }
    }
    public function createVaultCreditCardRecord($transactionData, $callBackSuccess = null, $callBackFailure = null)
    {
        $apiRequest = $this->Url . "VaultCreateCCRecord";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->Status >= 500 && $this->Status <= 599 && isset($callBackFailure)) {
            call_user_func($callBackFailure);
        }
        if ($this->Status >= 400 && $this->Status <= 499 && isset($callBackFailure)) {
            call_user_func($callBackFailure);
        }
        if ($this->Status >= 200 && $this->Status <= 299 && isset($callBackSuccess)) {
            call_user_func($callBackSuccess);
        }
    }
    public function createVaultShippingRecord($transactionData, $callBackSuccess = null, $callBackFailure = null)
    {
        $apiRequest = $this->Url . "VaultCreateShippingRecord";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->Status >= 500 && $this->Status <= 599 && isset($callBackFailure)) {
            call_user_func($callBackFailure);
        }
        if ($this->Status >= 400 && $this->Status <= 499 && isset($callBackFailure)) {
            call_user_func($callBackFailure);
        }
        if ($this->Status >= 200 && $this->Status <= 299 && isset($callBackSuccess)) {
            call_user_func($callBackSuccess);
        }
    }
    public function deleteVaultContainerAndAllAsscData(
        $transactionData,
        $callBackSuccess = null,
        $callBackFailure = null
    ) {
        $apiRequest = $this->Url . "VaultDeleteContainerAndAllAsscData";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->Status >= 500 && $this->Status <= 599 && isset($callBackFailure)) {
            call_user_func($callBackFailure);
        }
        if ($this->Status >= 400 && $this->Status <= 499 && isset($callBackFailure)) {
            call_user_func($callBackFailure);
        }
        if ($this->Status >= 200 && $this->Status <= 299 && isset($callBackSuccess)) {
            call_user_func($callBackSuccess);
        }
    }
    public function deleteVaultAchRecord($transactionData, $callBackSuccess = null, $callBackFailure = null)
    {
        $apiRequest = $this->Url . "VaultDeleteAchRecord";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->Status >= 500 && $this->Status <= 599 && isset($callBackFailure)) {
            call_user_func($callBackFailure);
        }
        if ($this->Status >= 400 && $this->Status <= 499 && isset($callBackFailure)) {
            call_user_func($callBackFailure);
        }
        if ($this->Status >= 200 && $this->Status <= 299 && isset($callBackSuccess)) {
            call_user_func($callBackSuccess);
        }
    }
    public function deleteVaultCreditCardRecord($transactionData, $callBackSuccess = null, $callBackFailure = null)
    {
        $apiRequest = $this->Url . "VaultDeleteCCRecord";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->Status >= 500 && $this->Status <= 599 && isset($callBackFailure)) {
            call_user_func($callBackFailure);
        }
        if ($this->Status >= 400 && $this->Status <= 499 && isset($callBackFailure)) {
            call_user_func($callBackFailure);
        }
        if ($this->Status >= 200 && $this->Status <= 299 && isset($callBackSuccess)) {
            call_user_func($callBackSuccess);
        }
    }
    public function deleteVaultShippingRecord($transactionData, $callBackSuccess = null, $callBackFailure = null)
    {
        $apiRequest = $this->Url . "VaultDeleteShippingRecord";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->Status >= 500 && $this->Status <= 599 && isset($callBackFailure)) {
            call_user_func($callBackFailure);
        }
        if ($this->Status >= 400 && $this->Status <= 499 && isset($callBackFailure)) {
            call_user_func($callBackFailure);
        }
        if ($this->Status >= 200 && $this->Status <= 299 && isset($callBackSuccess)) {
            call_user_func($callBackSuccess);
        }
    }
    public function updateVaultContainer($transactionData, $callBackSuccess = null, $callBackFailure = null)
    {
        $apiRequest = $this->Url . "VaultUpdateContainer";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->Status >= 500 && $this->Status <= 599 && isset($callBackFailure)) {
            call_user_func($callBackFailure);
        }
        if ($this->Status >= 400 && $this->Status <= 499 && isset($callBackFailure)) {
            call_user_func($callBackFailure);
        }
        if ($this->Status >= 200 && $this->Status <= 299 && isset($callBackSuccess)) {
            call_user_func($callBackSuccess);
        }
    }
    public function updateVaultAchRecord($transactionData, $callBackSuccess = null, $callBackFailure = null)
    {
        $apiRequest = $this->Url . "VaultUpdateAchRecord";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->Status >= 500 && $this->Status <= 599 && isset($callBackFailure)) {
            call_user_func($callBackFailure);
        }
        if ($this->Status >= 400 && $this->Status <= 499 && isset($callBackFailure)) {
            call_user_func($callBackFailure);
        }
        if ($this->Status >= 200 && $this->Status <= 299 && isset($callBackSuccess)) {
            call_user_func($callBackSuccess);
        }
    }
    public function updateVaultCreditCardRecord($transactionData, $callBackSuccess = null, $callBackFailure = null)
    {
        $apiRequest = $this->Url . "VaultUpdateCCRecord";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->Status >= 500 && $this->Status <= 599 && isset($callBackFailure)) {
            call_user_func($callBackFailure);
        }
        if ($this->Status >= 400 && $this->Status <= 499 && isset($callBackFailure)) {
            call_user_func($callBackFailure);
        }
        if ($this->Status >= 200 && $this->Status <= 299 && isset($callBackSuccess)) {
            call_user_func($callBackSuccess);
        }
    }
    public function updateVaultShippingRecord($transactionData, $callBackSuccess = null, $callBackFailure = null)
    {
        $apiRequest = $this->Url . "VaultUpdateShippingRecord";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->Status >= 500 && $this->Status <= 599 && isset($callBackFailure)) {
            call_user_func($callBackFailure);
        }
        if ($this->Status >= 400 && $this->Status <= 499 && isset($callBackFailure)) {
            call_user_func($callBackFailure);
        }
        if ($this->Status >= 200 && $this->Status <= 299 && isset($callBackSuccess)) {
            call_user_func($callBackSuccess);
        }
    }
    public function queryVaults($transactionData, $callBackSuccess = null, $callBackFailure = null)
    {
        $apiRequest = $this->Url . "VaultQueryVault";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->Status >= 500 && $this->Status <= 599 && isset($callBackFailure)) {
            call_user_func($callBackFailure);
        }
        if ($this->Status >= 400 && $this->Status <= 499 && isset($callBackFailure)) {
            call_user_func($callBackFailure);
        }
        if ($this->Status >= 200 && $this->Status <= 299 && isset($callBackSuccess)) {
            call_user_func($callBackSuccess);
        }
    }
    public function queryVaultForCreditCardRecords($transactionData, $callBackSuccess = null, $callBackFailure = null)
    {
        $apiRequest = $this->Url . "VaultQueryCCRecord";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->Status >= 500 && $this->Status <= 599 && isset($callBackFailure)) {
            call_user_func($callBackFailure);
        }
        if ($this->Status >= 400 && $this->Status <= 499 && isset($callBackFailure)) {
            call_user_func($callBackFailure);
        }
        if ($this->Status >= 200 && $this->Status <= 299 && isset($callBackSuccess)) {
            call_user_func($callBackSuccess);
        }
    }
    public function queryVaultForAchRecords($transactionData, $callBackSuccess = null, $callBackFailure = null)
    {
        $apiRequest = $this->Url . "VaultQueryAchRecord";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->Status >= 500 && $this->Status <= 599 && isset($callBackFailure)) {
            call_user_func($callBackFailure);
        }
        if ($this->Status >= 400 && $this->Status <= 499 && isset($callBackFailure)) {
            call_user_func($callBackFailure);
        }
        if ($this->Status >= 200 && $this->Status <= 299 && isset($callBackSuccess)) {
            call_user_func($callBackSuccess);
        }
    }
    public function queryVaultForShippingRecords($transactionData, $callBackSuccess = null, $callBackFailure = null)
    {
        $apiRequest = $this->Url . "VaultQueryShippingRecord";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->Status >= 500 && $this->Status <= 599 && isset($callBackFailure)) {
            call_user_func($callBackFailure);
        }
        if ($this->Status >= 400 && $this->Status <= 499 && isset($callBackFailure)) {
            call_user_func($callBackFailure);
        }
        if ($this->Status >= 200 && $this->Status <= 299 && isset($callBackSuccess)) {
            call_user_func($callBackSuccess);
        }
    }

    /*************************************************************************************
                                          MISC METHODS
     *************************************************************************************/

    public function modifyRecurring($transactionData, $callBackSuccess = null, $callBackFailure = null)
    {
        $apiRequest = $this->Url . "RecurringModify";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->Status >= 500 && $this->Status <= 599 && isset($callBackFailure)) {
            call_user_func($callBackFailure);
        }
        if ($this->Status >= 400 && $this->Status <= 499 && isset($callBackFailure)) {
            call_user_func($callBackFailure);
        }
        if ($this->Status >= 200 && $this->Status <= 299 && isset($callBackSuccess)) {
            call_user_func($callBackSuccess);
        }
    }

    public function submitAcctUpdater($transactionData, $callBackSuccess = null, $callBackFailure = null)
    {
        $apiRequest = $this->Url . "AccountUpdaterSubmit";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->Status >= 500 && $this->Status <= 599 && isset($callBackFailure)) {
            call_user_func($callBackFailure);
        }
        if ($this->Status >= 400 && $this->Status <= 499 && isset($callBackFailure)) {
            call_user_func($callBackFailure);
        }
        if ($this->Status >= 200 && $this->Status <= 299 && isset($callBackSuccess)) {
            call_user_func($callBackSuccess);
        }
    }

    public function submitAcctUpdaterVault($transactionData, $callBackSuccess = null, $callBackFailure = null)
    {
        $apiRequest = $this->Url . "AccountUpdaterSubmitVault";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->Status >= 500 && $this->Status <= 599 && isset($callBackFailure)) {
            call_user_func($callBackFailure);
        }
        if ($this->Status >= 400 && $this->Status <= 499 && isset($callBackFailure)) {
            call_user_func($callBackFailure);
        }
        if ($this->Status >= 200 && $this->Status <= 299 && isset($callBackSuccess)) {
            call_user_func($callBackSuccess);
        }
    }

    public function getAcctUpdaterReturn($transactionData, $callBackSuccess = null, $callBackFailure = null)
    {
        $apiRequest = $this->Url . "AccountUpdaterReturn";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->Status >= 500 && $this->Status <= 599 && isset($callBackFailure)) {
            call_user_func($callBackFailure);
        }
        if ($this->Status >= 400 && $this->Status <= 499 && isset($callBackFailure)) {
            call_user_func($callBackFailure);
        }
        if ($this->Status >= 200 && $this->Status <= 299 && isset($callBackSuccess)) {
            call_user_func($callBackSuccess);
        }
    }

    public function generateTokenFromCreditCard($transactionData, $callBackSuccess = null, $callBackFailure = null)
    {
        $apiRequest = $this->Url . "GenerateTokenFromCreditCard";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->Status >= 500 && $this->Status <= 599 && isset($callBackFailure)) {
            call_user_func($callBackFailure);
        }
        if ($this->Status >= 400 && $this->Status <= 499 && isset($callBackFailure)) {
            call_user_func($callBackFailure);
        }
        if ($this->Status >= 200 && $this->Status <= 299 && isset($callBackSuccess)) {
            call_user_func($callBackSuccess);
        }
    }

    /*************************************************************************************
                                        PROCESSING REQUEST
     *************************************************************************************/

    protected function performRequest($data, $apiRequest, $callBackSuccess = null, $callBackFailure = null)
    {
        /**
         * performRequest: this function is responsible for actually submitting the gateway request.
         * It also parses the response and sends it back to the original call.
         * The function works as follows:
         * 1. Set up input data so the gateway can understand it
         * 2. Set up cURL request. Note that since this is SOAP we have to pass very specific options.
         * Also note that since cURL is picky, we have to turn off SSL verification.
         * We're still transmitting https, though.
         * 3. Parse the response based on the information returned from the gateway and return it as an array.
         * The resulting array is stored in $this->Result in the RestGateway object.
         */
        try {
            if ($data == null) {
                $data = array();
            }
            $url = $apiRequest;
            $this->Result = array();
            $jsondata = json_encode(new \AAM\Payment\Api\Transaction($data), JSON_PRETTY_PRINT);
            $jsondata = utf8_encode($jsondata);
            $curl_handle = curl_init();
            curl_setopt($curl_handle, CURLOPT_URL, $url);
            curl_setopt($curl_handle, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($curl_handle, CURLOPT_POSTFIELDS, $jsondata);
            curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl_handle, CURLOPT_HTTPHEADER, array(
                "Content-type: application/json; charset-utf-8",
                "Content-Length: " . strlen($jsondata)
            ));
            curl_setopt($curl_handle, CURLOPT_SSL_VERIFYPEER, false);
            $response = curl_exec($curl_handle);
            $this->Status = curl_getinfo($curl_handle, CURLINFO_HTTP_CODE);
            if (connection_aborted()) {
                //This will handle aborted requests that PHP can detect,
                //returning a result that indicates POST was aborted.
                $this->Result = array(
                    "isError" => true,
                    "errorMessages" => "Request Aborted",
                    "isValid" => false,
                    "validations" => array(),
                    "action" => "gatewayError"
                );
                return $this->Result;
            }
            if (curl_errno($curl_handle) == 28) {
                //This will handle timeouts as per cURL error definitions.
                $this->Result = array(
                    "isError" => true,
                    "errorMessages" => "Request Timed Out",
                    "isValid" => false,
                    "validations" => array(),
                    "action" => "gatewayError"
                );
                return $this->Result;
            } else {
                $jresult = (json_decode($response, true));
                //$case = strtolower($jresult["action"]);
                $this->Result = $jresult;
                return $this->Result;
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
