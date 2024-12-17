<?php

declare(strict_types=1);

namespace ZenPaymentSdk;

enum ErrorCodes: string
{
    // 	Creating new transaction in payment service provider failed.
    case E00001 = 'E00001';
    // 	Transaction was expired on the payment service provider side.
    case E00002 = 'E00002';
    // 	Creating refund transaction in payment service provider failed.
    case E00003 = 'E00003';
    // 	Transaction was rejected by payment service provider.
    case E00004 = 'E00004';
    // 	Checking status of transaction limit was exceeded.
    case E00005 = 'E00005';
    // 	Refund attempts limit was exceeded.
    case E00006 = 'E00006';
    // 	Capturing transaction in payment service provider failed.
    case E00007 = 'E00007';
    // 	Creating new sendout in payment service provider failed.
    case S00001 = 'S00001';
    // 	Capturing sendout in payment service provider failed.
    case S00002 = 'S00002';
    // 	Transaction already exists
    case E40001 = 'E40001';
    // 	Reporting criteria unavailable
    case E40002 = 'E40002';
    // 	Reporting criteria is inactive
    case E40003 = 'E40003';
    // 	MID is inactive
    case E40004 = 'E40004';
    // 	Amount must be greater than 0
    case E40005 = 'E40005';
    // 	The amount exceeds the maximum permitted amount
    case E40006 = 'E40006';
    // 	Currency invalid
    case E40007 = 'E40007';
    // 	Currency invalid
    case E40008 = 'E40008';
    // 	Transaction in a wrong status for this action
    case E40009 = 'E40009';
    // 	Debit attempt after expiry of time window
    case E40010 = 'E40010';
    // 	Transaction does not exist
    case E40011 = 'E40011';
    // 	Authentication failed
    case E40012 = 'E40012';
    // 	General technical error
    case E40013 = 'E40013';
    // 	My paysafecard account not found by provided credentials
    case E40014 = 'E40014';
    // 	Customer account details do not match
    case E40015 = 'E40015';
    // 	The merchant does not have access to this function
    case E40016 = 'E40016';
    // 	The IP address of the merchant has not been added to IP-whitelist
    case E40017 = 'E40017';
    // 	The Amount specified in the call is invalid. The amount must be: 0 with 2 decimals
    case E40018 = 'E40018';
    // 	The signature in the call could not be verified using the merchant’s public key
    case E40019 = 'E40019';
    // 	The MessageID sent in the deposit has been used before
    case E40020 = 'E40020';
    // 	The enduser that initiated the payment is blocked
    case E40021 = 'E40021';
    // 	The Locale-attribute is sent with an incorrect value
    case E40022 = 'E40022';
    // 	This uuid has been used before
    case E40023 = 'E40023';
    // 	The EndUserID or MessageID sent in the request is null
    case E40024 = 'E40024';
    // 	The IP attribute sent is invalid. Only one IP address can be sent
    case E40025 = 'E40025';
    // 	The SuccessURL, FailURL, TemplateURL or NotificationURL sent in the request is malformed. Use valid http(s) address
    case E40026 = 'E40026';
    // 	The URLTarget, MessageID or EndUserID sent in the request is malformed
    case E40027 = 'E40027';
    // 	The merchant does not have enough balance on his/her account to execute the refund
    case E40028 = 'E40028';
    // 	The refund has already been processed
    case E40029 = 'E40029';
    // 	Some value or parameter in the refund call does not match the expected format
    case E40030 = 'E40030';
    // 	The refund call was sent before the money for the original deposit was settled
    case E40031 = 'E40031';
    // 	The OrderID sent in the refund call does not exist
    case E40032 = 'E40032';
    // 	Several refunds have been made on a single deposit, and the amount in the last refund was larger then the amount that is left to refund on that deposit
    case E40033 = 'E40033';
    // 	The refund call was sent before the money for the original deposit was settled or captured
    case E40034 = 'E40034';
    // 	The OrderID sent in the refund call is null
    case E40035 = 'E40035';
    // 	NotificationURL is not secured
    case E40036 = 'E40036';
    // 	Provided market does not exists
    case E40037 = 'E40037';
    // 	Provided store is inactive
    case E40038 = 'E40038';
    // 	SourceCurrency parameter must be set
    case E40039 = 'E40039';
    // 	DestinationCurrency parameter must be set
    case E40040 = 'E40040';
    // 	Payment address is invalid
    case E40041 = 'E40041';
    // 	Withdrawal is not allowed
    case E40042 = 'E40042';
    // 	Operation was already finished
    case E40043 = 'E40043';
    // 	Withdrawal amount is smaller than fee
    case E40044 = 'E40044';
    // 	Fetching currencies error
    case E40045 = 'E40045';
    // 	Provided url is invalid
    case E40046 = 'E40046';
    // 	Invalid parameter was provided
    case E40047 = 'E40047';
    // 	Customs declaration has already been registered
    case E40049 = 'E40049';
    // 	The declared amount exceeds the transaction amount
    case E40050 = 'E40050';
    // 	Missing parameter
    case E40051 = 'E40051';
    // 	Cannot get express payment method
    case E40052 = 'E40052';
    // 	Express payment method unavailable
    case E40053 = 'E40053';
    // 	Unable to fetch user
    case E40054 = 'E40054';
    // 	Invalid request
    case E40055 = 'E40055';
    // 	Invalid XML
    case E40056 = 'E40056';
    // 	Service temporarily unavailable due to maintenance
    case E40057 = 'E40057';
    // 	Specified method is not supported
    case E40058 = 'E40058';
    // 	No method specified
    case E40059 = 'E40059';
    // 	No request received
    case E40060 = 'E40060';
    // 	Internal error
    case E40061 = 'E40061';
    // 	The agent is not correct
    case E40062 = 'E40062';
    // 	The amount is not correct
    case E40063 = 'E40063';
    // 	Dynamic description (Depending on the payment method) Ex. The amount must be higher than 1
    case E40064 = 'E40064';
    // 	The amount must be lower than 999999
    case E40065 = 'E40065';
    // 	The city is not correct
    case E40066 = 'E40066';
    // 	The country is not correct
    case E40067 = 'E40067';
    // 	The currency is not correct
    case E40068 = 'E40068';
    // 	The date of the document is not correct
    case E40069 = 'E40069';
    // 	The date of birth is not correct
    case E40070 = 'E40070';
    // 	The email is not correct
    case E40071 = 'E40071';
    // 	The first name is not correct
    case E40072 = 'E40072';
    // 	The gender is not correct
    case E40073 = 'E40073';
    // 	The hash is not correct
    case E40074 = 'E40074';
    // 	The ip address is not correct
    case E40075 = 'E40075';
    // 	Your ip address is blocked temporarily
    case E40076 = 'E40076';
    // 	The KYC is not correct
    case E40077 = 'E40077';
    // 	The last name is not correct
    case E40078 = 'E40078';
    // 	The latitude is not correct
    case E40079 = 'E40079';
    // 	The longitude is not correct
    case E40080 = 'E40080';
    // 	The merchantId is not correct
    case E40081 = 'E40081';
    // 	The merchantTransactionId is not correct
    case E40082 = 'E40082';
    // 	The prohibitedForMinors parameter is not correct
    case E40083 = 'E40083';
    // 	The street is not correct
    case E40084 = 'E40084';
    // 	The subMerchantId is not correct
    case E40085 = 'E40085';
    // 	The telephone number is not correct
    case E40086 = 'E40086';
    // 	The test parameter is not correct
    case E40087 = 'E40087';
    // 	The zip code is not correct
    case E40088 = 'E40088';
    // 	The merchantId do not exist or is not active
    case E40089 = 'E40089';
    // 	The verion is not correct
    case E40090 = 'E40090';
    // 	The merchantTransactionId already exists
    case E40091 = 'E40091';
    // 	The merchantTransactionId does not exist
    case E40092 = 'E40092';
    // 	The urlCallback is not correct
    case E40093 = 'E40093';
    // 	The urlKo is not correct
    case E40094 = 'E40094';
    // 	The urlOk is not correct
    case E40095 = 'E40095';
    // 	The urlPending is not correct
    case E40096 = 'E40096';
    // 	The Myneosurf email is not correct
    case E40097 = 'E40097';
    // 	The Myneosurf email does not exist
    case E40098 = 'E40098';
    // 	The Myneosurf credentials are not correct
    case E40099 = 'E40099';
    // 	The Myneosurf password is not correct
    case E40100 = 'E40100';
    // 	The last three characters of the Myneosurf PIN are not correct
    case E40101 = 'E40101';
    // 	The Myneosurf corresponding account is not verified
    case E40102 = 'E40102';
    // 	The Myneosurf corresponding account is blocked
    case E40103 = 'E40103';
    // 	The service is under maintenance
    case E40104 = 'E40104';
    // 	Dynamic description (The KYC level 0 is not sufficient). Ex: Account limit:[2500 eur] per year. Available:[1000 eur]
    case E40105 = 'E40105';
    // 	Dynamic description (The KYC level 1 is not sufficient). Ex: Account limit:[1000 eur] per year. Available:[1000 eur]
    case E40106 = 'E40106';
    // 	Dynamic description (KYC level 2 limitation). Ex: Account limit:30000 eur per month. Available:[1000 eur]
    case E40107 = 'E40107';
    // 	Dynamic description (The KYC level 0 or 1 is not sufficient). Ex: Account limit:[1000 eur] per transaction
    case E40108 = 'E40108';
    // 	Dynamic description (KYC level 2 limitation). Ex: Account limit:[1500 eur] per transaction
    case E40109 = 'E40109';
    // 	The transaction was declined
    case E40110 = 'E40110';
    // 	The document type is not correct
    case E40111 = 'E40111';
    // 	Too many document are awaiting approval, thank you try again later
    case E40112 = 'E40112';
    // 	The limit of 10 uploaded documents is attempt for this user
    case E40113 = 'E40113';
    // 	The limit of 2 pending documents is attempt for this user
    case E40114 = 'E40114';
    // 	The limit of 2 validated documents is attempt for this user
    case E40115 = 'E40115';
    // 	No document was selected
    case E40116 = 'E40116';
    // 	Error with upload
    case E40117 = 'E40117';
    // 	The document is empty
    case E40118 = 'E40118';
    // 	The document exceeds the limit of 2 Mb
    case E40119 = 'E40119';
    // 	The document should have an extension
    case E40120 = 'E40120';
    // 	The document can only have one of these extensions: pdf, jpg, jpeg, bmp, gif, tif, tiff, png
    case E40121 = 'E40121';
    // 	Error with upload, the format is unauthorized
    case E40122 = 'E40122';
    // 	The document can’t be visualized
    case E40123 = 'E40123';
    // 	The status of this document has already been previously updated
    case E40124 = 'E40124';
    // 	The pincode is not correct
    case E40125 = 'E40125';
    // 	The email or password are not correct
    case E40126 = 'E40126';
    // 	The product id is not correct
    case E40127 = 'E40127';
    // 	The product is not active
    case E40128 = 'E40128';
    // 	The transaction is not authorized for resellers
    case E40129 = 'E40129';
    // 	The transaction is not authorized because the client is a minor
    case E40130 = 'E40130';
    // 	The merchant account is for test purpose only
    case E40131 = 'E40131';
    // 	The pincode and the test parameter must be the same type
    case E40132 = 'E40132';
    // 	The product can be used only on a limited list of merchants, and this one does not belong to this list
    case E40133 = 'E40133';
    // 	The transaction is not authorized for this merchant and this type of product
    case E40134 = 'E40134';
    // 	The amount to debit is less or equal to zero
    case E40135 = 'E40135';
    // 	The amount to debit is more than the available balance
    case E40136 = 'E40136';
    // 	The amount to credit is more than the maximum balance
    case E40137 = 'E40137';
    // 	The transaction to reverse does not exist
    case E40138 = 'E40138';
    // 	The transaction to reverse is not successful
    case E40139 = 'E40139';
    // 	The transaction to reverse is not refundable
    case E40140 = 'E40140';
    // 	The transaction to reverse have a different currency
    case E40141 = 'E40141';
    // 	The transaction to reverse have already been reversed entirely
    case E40142 = 'E40142';
    // 	The transaction to reverse cannot be reversed with this too high amount
    case E40143 = 'E40143';
    // 	This transaction is not allowed to this merchant
    case E40144 = 'E40144';
    // 	The maximum total amount of payouts is reached
    case E40145 = 'E40145';
    // 	Transaction not found
    case E40146 = 'E40146';
    // 	Service not found
    case E40147 = 'E40147';
    // 	Card not found
    case E40148 = 'E40148';
    // 	Parameter paymentProfileId or amount is invalid: One of them should be set
    case E40149 = 'E40149';
    // 	The amount is insufficiently disposed for the transaction
    case E40150 = 'E40150';
    // 	Wrong code type
    case E40170 = 'E40170';
    // 	CLS Entry creation Error
    case E40171 = 'E40171';
    // 	Wrong transaction amount
    case E40172 = 'E40172';
    // 	Wrong currency
    case E40173 = 'E40173';
    // 	Unable to find active user
    case E40174 = 'E40174';
    // 	Too late for Reversal
    case E40175 = 'E40175';
    // 	Operation not allowed for current transaction status
    case E40176 = 'E40176';
    // 	Request after correction
    case E40177 = 'E40177';
    // 	Commission is already authorized
    case E40178 = 'E40178';
    // 	Commission was rejected
    case E40179 = 'E40179';
    // 	Commission was not authorized
    case E40180 = 'E40180';
    // 	Commission was reversed
    case E40181 = 'E40181';
    // 	Commission is in complaint process
    case E40182 = 'E40182';
    // 	Transaction not found
    case E40183 = 'E40183';
    // 	Transaction ID is already used
    case E40184 = 'E40184';
    // 	Client application is not active
    case E40185 = 'E40185';
    // 	Client application was not found
    case E40186 = 'E40186';
    // 	Status transition is not possible
    case E40187 = 'E40187';
    // 	Appid is already used
    case E40188 = 'E40188';
    // 	Phone hash is already default
    case E40189 = 'E40189';
    // 	Wrong ticket
    case E40190 = 'E40190';
    // 	Ticket wrong format
    case E40191 = 'E40191';
    // 	Ticket was expired
    case E40192 = 'E40192';
    // 	Ticket limit exceeded
    case E40193 = 'E40193';
    // 	PIN code entry is not allowed for given ticket
    case E40194 = 'E40194';
    // 	PIN code entry is required for given ticket
    case E40195 = 'E40195';
    // 	Ticket wrong status
    case E40196 = 'E40196';
    // 	Unable to use provided ticket in this transaction type
    case E40197 = 'E40197';
    // 	Ticket was already used
    case E40198 = 'E40198';
    // 	Wrong transaction type
    case E40199 = 'E40199';
    // 	Transaction TX_TYPE in SVC_LEVEL mode is not supported
    case E40200 = 'E40200';
    // 	T6 Ticket limit exceeded
    case E40201 = 'E40201';
    // 	V9 Ticket limit exceeded
    case E40202 = 'E40202';
    // 	Active ticket number exceeded
    case E40203 = 'E40203';
    // 	IKO terminal transaction
    case E40204 = 'E40204';
    // 	BLIK general error
    case E40205 = 'E40205';
    // 	Alias not found
    case E40206 = 'E40206';
    // 	Alias was already assigned to specific device
    case E40207 = 'E40207';
    // 	Alias was not assigned to specific device
    case E40208 = 'E40208';
    // 	MSISDN Alias is incorrect
    case E40209 = 'E40209';
    // 	Alias security error
    case E40210 = 'E40210';
    // 	Wrong IBAN number
    case E40211 = 'E40211';
    // 	Client application has invalid status
    case E40212 = 'E40212';
    // 	T6 reversal is disabled for current account
    case E40213 = 'E40213';
    // 	Reversal in TXREF mode is disabled for current account
    case E40214 = 'E40214';
    // 	Invalid original transaction type for reversal
    case E40215 = 'E40215';
    // 	Reversal for transaction was received too late
    case E40216 = 'E40216';
    // 	Wrong Acquirer number
    case E40217 = 'E40217';
    // 	Reversal for given transaction already exists
    case E40218 = 'E40218';
    // 	Reversals amount sum is bigger than original transaction amount
    case E40219 = 'E40219';
    // 	Converted reversal for transaction was received too late
    case E40220 = 'E40220';
    // 	Converted reversal for transaction already exists
    case E40221 = 'E40221';
    // 	Wrong sub-schema subversion
    case E40222 = 'E40222';
    // 	Cashback transaction is not allowed
    case E40223 = 'E40223';
    // 	Wrong KNR number
    case E40224 = 'E40224';
    // 	Wrong alias context
    case E40225 = 'E40225';
    // 	Alias too long
    case E40226 = 'E40226';
    // 	IBAN field is not allowed
    case E40227 = 'E40227';
    // 	Alias limit exceeded for given application
    case E40228 = 'E40228';
    // 	Wrong alias type
    case E40229 = 'E40229';
    // 	Wrong alias scope
    case E40230 = 'E40230';
    // 	Url for alias is not allowed
    case E40231 = 'E40231';
    // 	Alias wrong expiration date
    case E40232 = 'E40232';
    // 	Wrong URL format
    case E40233 = 'E40233';
    // 	Too many aliases with given value
    case E40234 = 'E40234';
    // 	Multibank mode does not allow for OVERWRITE
    case E40235 = 'E40235';
    // 	Missing IBAN field
    case E40236 = 'E40236';
    // 	The publisher does not support aliases
    case E40237 = 'E40237';
    // 	Duplicate alias type
    case E40238 = 'E40238';
    // 	Alias is not unique
    case E40239 = 'E40239';
    // 	Missing alias field
    case E40240 = 'E40240';
    // 	Provided alias type cannot be used for given transaction type
    case E40241 = 'E40241';
    // 	All aliases was filtered out
    case E40242 = 'E40242';
    // 	Missing alias field
    case E40243 = 'E40243';
    // 	Transaction require ON-US mode
    case E40244 = 'E40244';
    // 	Transaction type and sub-type is not supported
    case E40245 = 'E40245';
    // 	Issuer is temporary unavailable
    case E40246 = 'E40246';
    // 	Retrying transactions is not allowed
    case E40247 = 'E40247';
    // 	Retrying transaction was after expiration time
    case E40248 = 'E40248';
    // 	Bad transaction retry sequence
    case E40249 = 'E40249';
    // 	Retrying transaction was too early
    case E40250 = 'E40250';
    // 	Retrying transaction is not allowed for previous retrying status
    case E40251 = 'E40251';
    // 	Wrong retry transaction data
    case E40252 = 'E40252';
    // 	Transaction retry does not exists
    case E40253 = 'E40253';
    // 	PAYID Alias is required for given transaction
    case E40254 = 'E40254';
    // 	Declined by TAS
    case E40255 = 'E40255';
    // 	Declined by user
    case E40256 = 'E40256';
    // 	Declined by SEC
    case E40257 = 'E40257';
    // 	System ERROR
    case E40258 = 'E40258';
    // 	General ERROR
    case E40259 = 'E40259';
    // 	Insufficient funds on user account
    case E40260 = 'E40260';
    // 	TIMEOUT
    case E40261 = 'E40261';
    // 	Transaction limit exceeded
    case E40262 = 'E40262';
    // 	User timeout
    case E40263 = 'E40263';
    // 	Declined by issuer
    case E40264 = 'E40264';
    // 	AM_TIMEOUT
    case E40265 = 'E40265';
    // 	Alias was declined
    case E40266 = 'E40266';
    // 	Unknown error
    case E40267 = 'E40267';
    // 	Unknown network error
    case E40268 = 'E40268';
    // 	Network error of chosen payment system
    case E40269 = 'E40269';
    // 	Access prohibited. Wrong login or not enough permissions for requested information
    case E40270 = 'E40270';
    // 	Incorrect signature of request
    case E40271 = 'E40271';
    // 	Invoice rejected by merchant
    case E40272 = 'E40272';
    // 	Invoice expired
    case E40273 = 'E40273';
    // 	Payment system refusal
    case E40274 = 'E40274';
    // 	Refund is not possible
    case E40275 = 'E40275';
    // 	Refund amount exceeded
    case E40276 = 'E40276';
    // 	Identifier not found
    case E40277 = 'E40277';
    // 	New request with the same nonce
    case E40278 = 'E40278';
    // 	Payment expired
    case E40279 = 'E40279';
    // 	Error simulated via merchant’s request
    case E40280 = 'E40280';
    // 	Refused by payer
    case E40281 = 'E40281';
    // 	Incorrect payment amount
    case E40282 = 'E40282';
    // 	Insufficient funds
    case E40283 = 'E40283';
    // 	Internal error. Refresh the page
    case E40284 = 'E40284';
    // 	Payment system authorization failed
    case E40285 = 'E40285';
    // 	3D Secure authorization failed
    case E40286 = 'E40286';
    // 	Invalid card number
    case E40287 = 'E40287';
    // 	Card expired
    case E40288 = 'E40288';
    // 	Card blocked
    case E40289 = 'E40289';
    // 	Amount limit exceeded
    case E40290 = 'E40290';
    // 	Quantity limit exceeded
    case E40291 = 'E40291';
    // 	Invalid operation
    case E40292 = 'E40292';
    // 	Unable to get details about created transaction
    case E40300 = 'E40300';
    // 	Unable to capture transaction
    case E40301 = 'E40301';
    // 	Unable to void created transaction
    case E40302 = 'E40302';
    // 	Unknown transaction status
    case E40303 = 'E40303';
    // 	Unable to create transaction
    case E40304 = 'E40304';
    // 	Unable to create transaction refund
    case E40305 = 'E40305';
    // 	Unauthorized request
    case E40306 = 'E40306';
    // 	Unsupported payment method channel
    case E40307 = 'E40307';
    // 	Unsupported payment method
    case E40308 = 'E40308';
    // 	Invalid payment configuration
    case E40309 = 'E40309';
    // 	Check-status request failed
    case E40310 = 'E40310';
    // 	Transaction cancel feature was not implemented
    case E40311 = 'E40311';
    // 	Unknown transaction status
    case E40312 = 'E40312';
    // 	Transaction check-status limit is exceeded
    case E40313 = 'E40313';
    // 	Callback input data is invalid
    case E40314 = 'E40314';
    // 	Unknown transaction
    case E40315 = 'E40315';
    // 	Pending transaction check-status strategy is missing
    case E40316 = 'E40316';
    // 	Transaction capture feature was not implemented
    case E40317 = 'E40317';
    // 	Identifier of transaction to refund param was missed
    case E40318 = 'E40318';
    // 	Refund transaction request was failed
    case E40319 = 'E40319';
    // 	Refund attempt number is exceeded
    case E40320 = 'E40320';
    // 	Deferred refund input is not valid
    case E40321 = 'E40321';
    // 	Returned transaction data does not match trx data
    case E40322 = 'E40322';
    // 	No customer account found by provided credentials
    case E40323 = 'E40323';
    // 	Customer limit exceeded.
    case E40324 = 'E40324';
    // 	Top-up limit exceeded.
    case E40325 = 'E40325';
    // 	Payout amount is below minimum payout amount of the merchant.
    case E40326 = 'E40326';
    // 	My paysafecard account not found on original transaction
    case E40327 = 'E40327';
    // 	Customer not active.
    case E40328 = 'E40328';
    // 	Customer yearly payout limit exceeded.
    case E40329 = 'E40329';
    // 	Expired payment. Stuck on verification.
    case CT0001 = 'CT0001';
    // 	Expired payment. Stuck on psp transaction created.
    case CT0002 = 'CT0002';
    // 	Expired payment. Stuck on rejected authorisation.
    case CT0003 = 'CT0003';
    // 	Error during psp request
    case C00001 = 'C00001';
    // 	Psp declines payment
    case C00002 = 'C00002';
    // 	Error during mpi enrollment request
    case C00003 = 'C00003';
    // 	Error during mpi authentication request
    case C00004 = 'C00004';
    // 	Mpi enrollment request timeout
    case C00005 = 'C00005';
    // 	Technical error
    case C00006 = 'C00006';
    // 	Error during authorisation
    case C00007 = 'C00007';
    // 	Psp request timeout
    case C00008 = 'C00008';
    // 	Uncategorized error during psp request
    case C00009 = 'C00009';
    // 	Conflict (409) returned by provider
    case C00010 = 'C00010';
    // 	Internal error. Unable to handle psp response. See logs.
    case C00011 = 'C00011';
    // 	Mpi authentication request timeout
    case C00012 = 'C00012';
    // 	Payment declined by fraud service
    case CR0001 = 'CR0001';
    // 	Transaction not found on psp
    case C00013 = 'C00013';
    // 	Error during verification server request
    case C00014 = 'C00014';
    // 	Error during versioning request
    case C00015 = 'C00015';
    // 	Error during authentication request
    case C00016 = 'C00016';
    // 	Versioning request timeout
    case C00017 = 'C00017';
    // 	Authentication request timeout
    case C00018 = 'C00018';
    // 	Authentication failed
    case C00019 = 'C00019';
    // 	Authentication failed
    case C00020 = 'C00020';
    // 	Error during processing transaction
    case C00021 = 'C00021';
    // 	Unable to determine provider
    case C10001 = 'C10001';
    // 	Inconsistent configuration
    case C10002 = 'C10002';
    // 	Invalid amount
    case C10003 = 'C10003';
    // 	Unable to determine provider
    case C10004 = 'C10004';
    // 	Unable to determine provider
    case C10005 = 'C10005';
    // 	Unable to determine provider
    case C10006 = 'C10006';
//     	Security failure
//    case C20009 = 'C20009';
//     	Suspected fraud
//    case C20011 = 'C20011';
    // 	Card type not supported in 3DS
    case C20087 = 'C20087';
//     	Suspected Fraud
//    case C40059 = 'C40059';
//     	Security violation
//    case C40063 = 'C40063';
    // 	Update card or cardholder data before reattempt; pspExternalRespCode = 83
    case C40087 = 'C40087';
    // 	Try again later; pspExternalRespCode = 83
    case C40088 = 'C40088';
    // 	First transaction not found
    case C50001 = 'C50001';
    // 	First transaction invalid state
    case C50002 = 'C50002';
    // 	First transaction service target not matched
    case C50003 = 'C50003';
    // 	First transaction card token not matched
    case C50004 = 'C50004';
    // 	Unable to validate first transaction
    case C50005 = 'C50005';
    // 	First transaction missing data
    case C50006 = 'C50006';
    // 	Technical error
    case C50007 = 'C50007';
    // 	Technical error
    case C30M69 = 'C30M69';
    // 	Authentication process timed out
    case C30M68 = 'C30M68';
    // 	Technical error
    case C30M66 = 'C30M66';
    // 	Technical error
    case C30M65 = 'C30M65';
    // 	Technical error
    case C30M64 = 'C30M64';
    // 	Technical error
    case C30M63 = 'C30M63';
    // 	An error occurred during the 3D secure process
    case C30M50 = 'C30M50';
    // 	Technical error
    case C30M39 = 'C30M39';
    // 	The transaction has been denied by the Gateway because 3D secure Authentication failed.
    case C30M38 = 'C30M38';
    // 	Technical error
    case C30M37 = 'C30M37';
    // 	Technical error
    case C30M36 = 'C30M36';
    // 	Technical error
    case C30M35 = 'C30M35';
    // 	Technical error
    case C30M33 = 'C30M33';
    // 	Technical error
    case C30M32 = 'C30M32';
    // 	Transaction Failed due to error in 3D secure process
    case C30M30 = 'C30M30';
    // 	Processor authentication error.
    case C30M20 = 'C30M20';
    // 	Technical error
    case C30M17 = 'C30M17';
    // 	Technical error
    case C30M16 = 'C30M16';
    // 	Technical error
    case C30M15 = 'C30M15';
    // 	Technical error
    case C30M13 = 'C30M13';
    // 	Technical error
    case C30M12 = 'C30M12';
    // 	Format Error
    case C30M11 = 'C30M11';
    // 	Internal server error.
    case C30M10 = 'C30M10';
    // 	The parameter is malformed.
    case C30M09 = 'C30M09';
    // 	The Package Signature is malformed.
    case C30M08 = 'C30M08';
    // 	Incorrect Gateway Response. Connection is broken.
    case C30M07 = 'C30M07';
    // 	The transaction has been denied by the Gateway.
    case C30001 = 'C30001';
    // 	Technical error
    case C30002 = 'C30002';
    // 	Technical error
    case C30003 = 'C30003';
    // 	The transaction has been denied by the Gateway due to an interchange timeout.
    case C30004 = 'C30004';
    // 	The transaction has been declined.
    case C30005 = 'C30005';
    // 	Transaction pending cardholder authentication.
    case C30006 = 'C30006';
    // 	Technical error
    case C30009 = 'C30009';
    // 	The transaction has been partially approved.
    case C30010 = 'C30010';
    // 	The queried transaction is currently being processed.
    case C30011 = 'C30011';
    // 	Technical error
    case C30013 = 'C30013';
    // 	Technical error
    case C30015 = 'C30015';
    // 	Refer to card issuer
    case C40001 = 'C40001';
    // 	Technical error
    case C40003 = 'C40003';
    // 	Technical error
    case C40004 = 'C40004';
    // 	Do not honor
    case C40005 = 'C40005';
    // 	General error
    case C40006 = 'C40006';
    // 	Technical error
    case C40007 = 'C40007';
    // 	Honor with identification
    case C40008 = 'C40008';
    // 	Invalid transaction
    case C40012 = 'C40012';
    // 	Invalid transaction amount
    case C40013 = 'C40013';
    // 	Invalid card number
    case C40014 = 'C40014';
    // 	No such issuer
    case C40015 = 'C40015';
    // 	Format error
    case C40030 = 'C40030';
    // 	Merchant should retain card (card reported lost)
    case C40041 = 'C40041';
    // 	Merchant should retain card (card reported stolen)
    case C40043 = 'C40043';
    // 	Closed Card Account
    case C40046 = 'C40046';
    // 	Insufficient funds
    case C40051 = 'C40051';
    // 	Expired card
    case C40054 = 'C40054';
    // 	Incorrect PIN
    case C40055 = 'C40055';
    // 	Transaction not permitted to cardholder
    case C40057 = 'C40057';
    // 	Technical error
    case C40058 = 'C40058';
    // 	Suspected transaction. Contact Your Bank
    case C40059 = 'C40059';
    // 	Exceeds approval amount limit
    case C40061 = 'C40061';
    // 	Restricted Card
    case C40062 = 'C40062';
    // 	Technical error
    case C40063 = 'C40063';
    // 	Exceeds withdrawal frequency limit
    case C40065 = 'C40065';
    // 	Allowable number of PIN-entry tries exceeded
    case C40075 = 'C40075';
    // 	Blocked or card not activated
    case C40078 = 'C40078';
    // 	Account Closed – Do not try again
    case C40089 = 'C40089';
    // 	Cutoff is in process
    case C40090 = 'C40090';
    // 	Issuer unavailable or switch inoperative
    case C40091 = 'C40091';
    // 	Technical error
    case C40093 = 'C40093';
    // 	Duplicate transaction
    case C40094 = 'C40094';
    // 	System malfunction, System malfunction or certain field error conditions
    case C40096 = 'C40096';
    // 	Unable to authorize / CVV2 failure
    case C400N0 = 'C400N0';
    // 	Soft decline (SCA required)
    case C400O5 = 'C400O5';
    // 	At least one of the input parameters is missing. Parameter [X] is missing.
    case C3PM14 = 'C3PM14';
    // 	Transaction failed due to too many requests.
    case C3PM09 = 'C3PM09';
    // 	Payment Method not allowed for this merchant.
    case C3PM18 = 'C3PM18';
    // 	Operation not allowed for this merchant
    case C3PM20 = 'C3PM20';
    // 	Invalid Payment Method
    case C3PM21 = 'C3PM21';
    // 	Payment Method missing.
    case C3PM22 = 'C3PM22';
    // 	Transaction Amount not within pre-defined threshold.
    case C3PM50 = 'C3PM50';
    // 	Transaction Amount exceeds or does not match the Transaction amount referenced in the request.
    case C3PM52 = 'C3PM52';
    // 	Amount exceeds the Transaction Amount referenced in the request
    case C3PM53 = 'C3PM53';
    // 	The grand total amount does not match the item total amount.
    case C3PM55 = 'C3PM55';
    // 	The operation on the transaction referenced in the request has already been executed successful
    case C3PM64 = 'C3PM64';
    // 	Referral operation not allowed.
    case C3PM66 = 'C3PM66';
    // 	Could not find the original transaction. Make sure that it exists and that its details were transmitted correctly
    case C3PM67 = 'C3PM67';
    // 	Technical error
    case C3PM80 = 'C3PM80';
    // 	Technical error
    case CR0004 = 'CR0004';
    // 	Card authentication failed
    case C20001 = 'C20001';
    // 	Unknown Device
    case C20002 = 'C20002';
    // 	Unsupported Device
    case C20003 = 'C20003';
    // 	Exceeds authentication frequency limit
    case C20004 = 'C20004';
    // 	Expired card
    case C20005 = 'C20005';
    // 	Invalid card number
    case C20006 = 'C20006';
    // 	Invalid transaction
    case C20007 = 'C20007';
    // 	No Card record
    case C20008 = 'C20008';
    // 	Technical error
    case C20009 = 'C20009';
    // 	Stolen card
    case C20010 = 'C20010';
    // 	Suspected fraud
    case C20011 = 'C20011';
    // 	Transaction not permitted to cardholder
    case C20012 = 'C20012';
    // 	Cardholder not enrolled in service
    case C20013 = 'C20013';
    // 	Transaction timed out / Abandoned transaction
    case C20014 = 'C20014';
    // 	Technical error
    case C20015 = 'C20015';
    // 	Technical error
    case C20016 = 'C20016';
    // 	Technical error
    case C20017 = 'C20017';
    // 	Technical error
    case C20018 = 'C20018';
    // 	Exceeds ACS maximum challenges
    case C20019 = 'C20019';
    // 	Non-Payment transaction not supported
    case C20020 = 'C20020';
    // 	Technical error
    case C20021 = 'C20021';
    // 	ACS technical issue
    case C20022 = 'C20022';
    // 	Decoupled Authentication required by ACS but not requested by 3DS Requestor
    case C20023 = 'C20023';
    // 	3DS Requestor Decoupled Max Expiry Time exceeded
    case C20024 = 'C20024';
    // 	Decoupled Authentication was provided insufficient time to authenticate cardholder. ACS will not make attempt
    case C20025 = 'C20025';
    // 	Authentication attempted but not performed by the cardholder
    case C20026 = 'C20026';
    // 	3DS Authentication Error
    case C20101 = 'C20101';
    // 	3DS Authentication Error
    case C20102 = 'C20102';
    // 	3DS Authentication Error
    case C20103 = 'C20103';
    // 	3DS Authentication Error
    case C20201 = 'C20201';
    // 	3DS Authentication Error
    case C20202 = 'C20202';
    // 	3DS Authentication Error – Invalid data
    case C20203 = 'C20203';
    // 	3DS Authentication Error – Duplicate Data Element
    case C20204 = 'C20204';
    // 	3DS Authentication Error
    case C20301 = 'C20301';
    // 	3DS Authentication Error
    case C20302 = 'C20302';
    // 	3DS Authentication Error
    case C20303 = 'C20303';
    // 	3DS Authentication Error – ISO Code Invalid
    case C20304 = 'C20304';
    // 	3DS Authentication Error
    case C20305 = 'C20305';
    // 	3DS Authentication Error – Invalid Merchant Category Code (MCC)
    case C20306 = 'C20306';
    // 	3DS Authentication Error – Serial Number Not Valid
    case C20307 = 'C20307';
    // 	3DS Authentication Error – Time Out
    case C20402 = 'C20402';
    // 	3DS Authentication Error
    case C20403 = 'C20403';
    // 	3DS Authentication Error
    case C20404 = 'C20404';
    // 	3DS Authentication Error
    case C20405 = 'C20405';
    // 	Transaction failed, please refer to issuer
    case E40330 = 'E40330';
    // 	Message format error
    case E40331 = 'E40331';
    // 	Transaction does not exist / Abandoned transaction
    case E40333 = 'E40333';
    // 	Original transaction does not exist or state is incorrect
    case E40334 = 'E40334';
    // 	Invalid card number
    case E40337 = 'E40337';
    // 	Wrong PIN, expiry date or CVN2
    case E40339 = 'E40339';
    // 	Wrong cardholder ID information, mobile phone number or CVN2
    case E40340 = 'E40340';
    // 	You have entered your PIN too many times
    case E40341 = 'E40341';
    // 	Your card does not support this service
    case E40342 = 'E40342';

    public function getErrorList()
    {
        return [
            self::E00001->value => 'Creating new transaction in payment service provider failed.',
            self::E00002->value => 'Transaction was expired on the payment service provider side.',
            self::E00003->value => 'Creating refund transaction in payment service provider failed.',
            self::E00004->value => 'Transaction was rejected by payment service provider.',
            self::E00005->value => 'Checking status of transaction limit was exceeded.',
            self::E00006->value => 'Refund attempts limit was exceeded.',
            self::E00007->value => 'Capturing transaction in payment service provider failed.',
            self::S00001->value => 'Creating new sendout in payment service provider failed.',
            self::S00002->value => 'Capturing sendout in payment service provider failed.',
            self::E40001->value => 'Transaction already exists',
            self::E40002->value => 'Reporting criteria unavailable',
            self::E40003->value => 'Reporting criteria is inactive',
            self::E40004->value => 'MID is inactive',
            self::E40005->value => 'Amount must be greater than 0',
            self::E40006->value => 'The amount exceeds the maximum permitted amount',
            self::E40007->value => 'Currency invalid',
            self::E40008->value => 'Currency invalid',
            self::E40009->value => 'Transaction in a wrong status for this action',
            self::E40010->value => 'Debit attempt after expiry of time window',
            self::E40011->value => 'Transaction does not exist',
            self::E40012->value => 'Authentication failed',
            self::E40013->value => 'General technical error',
            self::E40014->value => 'My paysafecard account not found by provided credentials',
            self::E40015->value => 'Customer account details do not match',
            self::E40016->value => 'The merchant does not have access to this function',
            self::E40017->value => 'The IP address of the merchant has not been added to IP-whitelist',
            self::E40018->value => 'The Amount specified in the call is invalid. The amount must be: 0 with 2 decimals',
            self::E40019->value => 'The signature in the call could not be verified using the merchant’s public key',
            self::E40020->value => 'The MessageID sent in the deposit has been used before',
            self::E40021->value => 'The enduser that initiated the payment is blocked',
            self::E40022->value => 'The Locale-attribute is sent with an incorrect value',
            self::E40023->value => 'This uuid has been used before',
            self::E40024->value => 'The EndUserID or MessageID sent in the request is null',
            self::E40025->value => 'The IP attribute sent is invalid. Only one IP address can be sent',
            self::E40026->value => 'The SuccessURL, FailURL, TemplateURL or NotificationURL sent in the request is malformed. Use valid http(s) address',
            self::E40027->value => 'The URLTarget, MessageID or EndUserID sent in the request is malformed',
            self::E40028->value => 'The merchant does not have enough balance on his/her account to execute the refund',
            self::E40029->value => 'The refund has already been processed',
            self::E40030->value => 'Some value or parameter in the refund call does not match the expected format',
            self::E40031->value => 'The refund call was sent before the money for the original deposit was settled',
            self::E40032->value => 'The OrderID sent in the refund call does not exist',
            self::E40033->value => 'Several refunds have been made on a single deposit, and the amount in the last refund was larger then the amount that is left to refund on that deposit',
            self::E40034->value => 'The refund call was sent before the money for the original deposit was settled or captured',
            self::E40035->value => 'The OrderID sent in the refund call is null',
            self::E40036->value => 'NotificationURL is not secured',
            self::E40037->value => 'Provided market does not exists',
            self::E40038->value => 'Provided store is inactive',
            self::E40039->value => 'SourceCurrency parameter must be set',
            self::E40040->value => 'DestinationCurrency parameter must be set',
            self::E40041->value => 'Payment address is invalid',
            self::E40042->value => 'Withdrawal is not allowed',
            self::E40043->value => 'Operation was already finished',
            self::E40044->value => 'Withdrawal amount is smaller than fee',
            self::E40045->value => 'Fetching currencies error',
            self::E40046->value => 'Provided url is invalid',
            self::E40047->value => 'Invalid parameter was provided',
            self::E40049->value => 'Customs declaration has already been registered',
            self::E40050->value => 'The declared amount exceeds the transaction amount',
            self::E40051->value => 'Missing parameter',
            self::E40052->value => 'Cannot get express payment method',
            self::E40053->value => 'Express payment method unavailable',
            self::E40054->value => 'Unable to fetch user',
            self::E40055->value => 'Invalid request',
            self::E40056->value => 'Invalid XML',
            self::E40057->value => 'Service temporarily unavailable due to maintenance',
            self::E40058->value => 'Specified method is not supported',
            self::E40059->value => 'No method specified',
            self::E40060->value => 'No request received',
            self::E40061->value => 'Internal error',
            self::E40062->value => 'The agent is not correct',
            self::E40063->value => 'The amount is not correct',
            self::E40064->value => 'Dynamic description (Depending on the payment method) Ex. The amount must be higher than 1',
            self::E40065->value => 'The amount must be lower than 999999',
            self::E40066->value => 'The city is not correct',
            self::E40067->value => 'The country is not correct',
            self::E40068->value => 'The currency is not correct',
            self::E40069->value => 'The date of the document is not correct',
            self::E40070->value => 'The date of birth is not correct',
            self::E40071->value => 'The email is not correct',
            self::E40072->value => 'The first name is not correct',
            self::E40073->value => 'The gender is not correct',
            self::E40074->value => 'The hash is not correct',
            self::E40075->value => 'The ip address is not correct',
            self::E40076->value => 'Your ip address is blocked temporarily',
            self::E40077->value => 'The KYC is not correct',
            self::E40078->value => 'The last name is not correct',
            self::E40079->value => 'The latitude is not correct',
            self::E40080->value => 'The longitude is not correct',
            self::E40081->value => 'The merchantId is not correct',
            self::E40082->value => 'The merchantTransactionId is not correct',
            self::E40083->value => 'The prohibitedForMinors parameter is not correct',
            self::E40084->value => 'The street is not correct',
            self::E40085->value => 'The subMerchantId is not correct',
            self::E40086->value => 'The telephone number is not correct',
            self::E40087->value => 'The test parameter is not correct',
            self::E40088->value => 'The zip code is not correct',
            self::E40089->value => 'The merchantId do not exist or is not active',
            self::E40090->value => 'The verion is not correct',
            self::E40091->value => 'The merchantTransactionId already exists',
            self::E40092->value => 'The merchantTransactionId does not exist',
            self::E40093->value => 'The urlCallback is not correct',
            self::E40094->value => 'The urlKo is not correct',
            self::E40095->value => 'The urlOk is not correct',
            self::E40096->value => 'The urlPending is not correct',
            self::E40097->value => 'The Myneosurf email is not correct',
            self::E40098->value => 'The Myneosurf email does not exist',
            self::E40099->value => 'The Myneosurf credentials are not correct',
            self::E40100->value => 'The Myneosurf password is not correct',
            self::E40101->value => 'The last three characters of the Myneosurf PIN are not correct',
            self::E40102->value => 'The Myneosurf corresponding account is not verified',
            self::E40103->value => 'The Myneosurf corresponding account is blocked',
            self::E40104->value => 'The service is under maintenance',
            self::E40105->value => 'Dynamic description (The KYC level 0 is not sufficient). Ex: Account limit:[2500 eur] per year. Available:[1000 eur]',
            self::E40106->value => 'Dynamic description (The KYC level 1 is not sufficient). Ex: Account limit:[1000 eur] per year. Available:[1000 eur]',
            self::E40107->value => 'Dynamic description (KYC level 2 limitation). Ex: Account limit:30000 eur per month. Available:[1000 eur]',
            self::E40108->value => 'Dynamic description (The KYC level 0 or 1 is not sufficient). Ex: Account limit:[1000 eur] per transaction',
            self::E40109->value => 'Dynamic description (KYC level 2 limitation). Ex: Account limit:[1500 eur] per transaction',
            self::E40110->value => 'The transaction was declined',
            self::E40111->value => 'The document type is not correct',
            self::E40112->value => 'Too many document are awaiting approval, thank you try again later',
            self::E40113->value => 'The limit of 10 uploaded documents is attempt for this user',
            self::E40114->value => 'The limit of 2 pending documents is attempt for this user',
            self::E40115->value => 'The limit of 2 validated documents is attempt for this user',
            self::E40116->value => 'No document was selected',
            self::E40117->value => 'Error with upload',
            self::E40118->value => 'The document is empty',
            self::E40119->value => 'The document exceeds the limit of 2 Mb',
            self::E40120->value => 'The document should have an extension',
            self::E40121->value => 'The document can only have one of these extensions: pdf, jpg, jpeg, bmp, gif, tif, tiff, png',
            self::E40122->value => 'Error with upload, the format is unauthorized',
            self::E40123->value => 'The document can’t be visualized',
            self::E40124->value => 'The status of this document has already been previously updated',
            self::E40125->value => 'The pincode is not correct',
            self::E40126->value => 'The email or password are not correct',
            self::E40127->value => 'The product id is not correct',
            self::E40128->value => 'The product is not active',
            self::E40129->value => 'The transaction is not authorized for resellers',
            self::E40130->value => 'The transaction is not authorized because the client is a minor',
            self::E40131->value => 'The merchant account is for test purpose only',
            self::E40132->value => 'The pincode and the test parameter must be the same type',
            self::E40133->value => 'The product can be used only on a limited list of merchants, and this one does not belong to this list',
            self::E40134->value => 'The transaction is not authorized for this merchant and this type of product',
            self::E40135->value => 'The amount to debit is less or equal to zero',
            self::E40136->value => 'The amount to debit is more than the available balance',
            self::E40137->value => 'The amount to credit is more than the maximum balance',
            self::E40138->value => 'The transaction to reverse does not exist',
            self::E40139->value => 'The transaction to reverse is not successful',
            self::E40140->value => 'The transaction to reverse is not refundable',
            self::E40141->value => 'The transaction to reverse have a different currency',
            self::E40142->value => 'The transaction to reverse have already been reversed entirely',
            self::E40143->value => 'The transaction to reverse cannot be reversed with this too high amount',
            self::E40144->value => 'This transaction is not allowed to this merchant',
            self::E40145->value => 'The maximum total amount of payouts is reached',
            self::E40146->value => 'Transaction not found',
            self::E40147->value => 'Service not found',
            self::E40148->value => 'Card not found',
            self::E40149->value => 'Parameter paymentProfileId or amount is invalid: One of them should be set',
            self::E40150->value => 'The amount is insufficiently disposed for the transaction',
            self::E40170->value => 'Wrong code type',
            self::E40171->value => 'CLS Entry creation Error',
            self::E40172->value => 'Wrong transaction amount',
            self::E40173->value => 'Wrong currency',
            self::E40174->value => 'Unable to find active user',
            self::E40175->value => 'Too late for Reversal',
            self::E40176->value => 'Operation not allowed for current transaction status',
            self::E40177->value => 'Request after correction',
            self::E40178->value => 'Commission is already authorized',
            self::E40179->value => 'Commission was rejected',
            self::E40180->value => 'Commission was not authorized',
            self::E40181->value => 'Commission was reversed',
            self::E40182->value => 'Commission is in complaint process',
            self::E40183->value => 'Transaction not found',
            self::E40184->value => 'Transaction ID is already used',
            self::E40185->value => 'Client application is not active',
            self::E40186->value => 'Client application was not found',
            self::E40187->value => 'Status transition is not possible',
            self::E40188->value => 'Appid is already used',
            self::E40189->value => 'Phone hash is already default',
            self::E40190->value => 'Wrong ticket',
            self::E40191->value => 'Ticket wrong format',
            self::E40192->value => 'Ticket was expired',
            self::E40193->value => 'Ticket limit exceeded',
            self::E40194->value => 'PIN code entry is not allowed for given ticket',
            self::E40195->value => 'PIN code entry is required for given ticket',
            self::E40196->value => 'Ticket wrong status',
            self::E40197->value => 'Unable to use provided ticket in this transaction type',
            self::E40198->value => 'Ticket was already used',
            self::E40199->value => 'Wrong transaction type',
            self::E40200->value => 'Transaction TX_TYPE in SVC_LEVEL mode is not supported',
            self::E40201->value => 'T6 Ticket limit exceeded',
            self::E40202->value => 'V9 Ticket limit exceeded',
            self::E40203->value => 'Active ticket number exceeded',
            self::E40204->value => 'IKO terminal transaction',
            self::E40205->value => 'BLIK general error',
            self::E40206->value => 'Alias not found',
            self::E40207->value => 'Alias was already assigned to specific device',
            self::E40208->value => 'Alias was not assigned to specific device',
            self::E40209->value => 'MSISDN Alias is incorrect',
            self::E40210->value => 'Alias security error',
            self::E40211->value => 'Wrong IBAN number',
            self::E40212->value => 'Client application has invalid status',
            self::E40213->value => 'T6 reversal is disabled for current account',
            self::E40214->value => 'Reversal in TXREF mode is disabled for current account',
            self::E40215->value => 'Invalid original transaction type for reversal',
            self::E40216->value => 'Reversal for transaction was received too late',
            self::E40217->value => 'Wrong Acquirer number',
            self::E40218->value => 'Reversal for given transaction already exists',
            self::E40219->value => 'Reversals amount sum is bigger than original transaction amount',
            self::E40220->value => 'Converted reversal for transaction was received too late',
            self::E40221->value => 'Converted reversal for transaction already exists',
            self::E40222->value => 'Wrong sub-schema subversion',
            self::E40223->value => 'Cashback transaction is not allowed',
            self::E40224->value => 'Wrong KNR number',
            self::E40225->value => 'Wrong alias context',
            self::E40226->value => 'Alias too long',
            self::E40227->value => 'IBAN field is not allowed',
            self::E40228->value => 'Alias limit exceeded for given application',
            self::E40229->value => 'Wrong alias type',
            self::E40230->value => 'Wrong alias scope',
            self::E40231->value => 'Url for alias is not allowed',
            self::E40232->value => 'Alias wrong expiration date',
            self::E40233->value => 'Wrong URL format',
            self::E40234->value => 'Too many aliases with given value',
            self::E40235->value => 'Multibank mode does not allow for OVERWRITE',
            self::E40236->value => 'Missing IBAN field',
            self::E40237->value => 'The publisher does not support aliases',
            self::E40238->value => 'Duplicate alias type',
            self::E40239->value => 'Alias is not unique',
            self::E40240->value => 'Missing alias field',
            self::E40241->value => 'Provided alias type cannot be used for given transaction type',
            self::E40242->value => 'All aliases was filtered out',
            self::E40243->value => 'Missing alias field',
            self::E40244->value => 'Transaction require ON-US mode',
            self::E40245->value => 'Transaction type and sub-type is not supported',
            self::E40246->value => 'Issuer is temporary unavailable',
            self::E40247->value => 'Retrying transactions is not allowed',
            self::E40248->value => 'Retrying transaction was after expiration time',
            self::E40249->value => 'Bad transaction retry sequence',
            self::E40250->value => 'Retrying transaction was too early',
            self::E40251->value => 'Retrying transaction is not allowed for previous retrying status',
            self::E40252->value => 'Wrong retry transaction data',
            self::E40253->value => 'Transaction retry does not exists',
            self::E40254->value => 'PAYID Alias is required for given transaction',
            self::E40255->value => 'Declined by TAS',
            self::E40256->value => 'Declined by user',
            self::E40257->value => 'Declined by SEC',
            self::E40258->value => 'System ERROR',
            self::E40259->value => 'General ERROR',
            self::E40260->value => 'Insufficient funds on user account',
            self::E40261->value => 'TIMEOUT',
            self::E40262->value => 'Transaction limit exceeded',
            self::E40263->value => 'User timeout',
            self::E40264->value => 'Declined by issuer',
            self::E40265->value => 'AM_TIMEOUT',
            self::E40266->value => 'Alias was declined',
            self::E40267->value => 'Unknown error',
            self::E40268->value => 'Unknown network error',
            self::E40269->value => 'Network error of chosen payment system',
            self::E40270->value => 'Access prohibited. Wrong login or not enough permissions for requested information',
            self::E40271->value => 'Incorrect signature of request',
            self::E40272->value => 'Invoice rejected by merchant',
            self::E40273->value => 'Invoice expired',
            self::E40274->value => 'Payment system refusal',
            self::E40275->value => 'Refund is not possible',
            self::E40276->value => 'Refund amount exceeded',
            self::E40277->value => 'Identifier not found',
            self::E40278->value => 'New request with the same nonce',
            self::E40279->value => 'Payment expired',
            self::E40280->value => 'Error simulated via merchant’s request',
            self::E40281->value => 'Refused by payer',
            self::E40282->value => 'Incorrect payment amount',
            self::E40283->value => 'Insufficient funds',
            self::E40284->value => 'Internal error. Refresh the page',
            self::E40285->value => 'Payment system authorization failed',
            self::E40286->value => '3D Secure authorization failed',
            self::E40287->value => 'Invalid card number',
            self::E40288->value => 'Card expired',
            self::E40289->value => 'Card blocked',
            self::E40290->value => 'Amount limit exceeded',
            self::E40291->value => 'Quantity limit exceeded',
            self::E40292->value => 'Invalid operation',
            self::E40300->value => 'Unable to get details about created transaction',
            self::E40301->value => 'Unable to capture transaction',
            self::E40302->value => 'Unable to void created transaction',
            self::E40303->value => 'Unknown transaction status',
            self::E40304->value => 'Unable to create transaction',
            self::E40305->value => 'Unable to create transaction refund',
            self::E40306->value => 'Unauthorized request',
            self::E40307->value => 'Unsupported payment method channel',
            self::E40308->value => 'Unsupported payment method',
            self::E40309->value => 'Invalid payment configuration',
            self::E40310->value => 'Check-status request failed',
            self::E40311->value => 'Transaction cancel feature was not implemented',
            self::E40312->value => 'Unknown transaction status',
            self::E40313->value => 'Transaction check-status limit is exceeded',
            self::E40314->value => 'Callback input data is invalid',
            self::E40315->value => 'Unknown transaction',
            self::E40316->value => 'Pending transaction check-status strategy is missing',
            self::E40317->value => 'Transaction capture feature was not implemented',
            self::E40318->value => 'Identifier of transaction to refund param was missed',
            self::E40319->value => 'Refund transaction request was failed',
            self::E40320->value => 'Refund attempt number is exceeded',
            self::E40321->value => 'Deferred refund input is not valid',
            self::E40322->value => 'Returned transaction data does not match trx data',
            self::E40323->value => 'No customer account found by provided credentials',
            self::E40324->value => 'Customer limit exceeded.',
            self::E40325->value => 'Top-up limit exceeded.',
            self::E40326->value => 'Payout amount is below minimum payout amount of the merchant.',
            self::E40327->value => 'My paysafecard account not found on original transaction',
            self::E40328->value => 'Customer not active.',
            self::E40329->value => 'Customer yearly payout limit exceeded.',
            self::CT0001->value => 'Expired payment. Stuck on verification.',
            self::CT0002->value => 'Expired payment. Stuck on psp transaction created.',
            self::CT0003->value => 'Expired payment. Stuck on rejected authorisation.',
            self::C00001->value => 'Error during psp request',
            self::C00002->value => 'Psp declines payment',
            self::C00003->value => 'Error during mpi enrollment request',
            self::C00004->value => 'Error during mpi authentication request',
            self::C00005->value => 'Mpi enrollment request timeout',
            self::C00006->value => 'Technical error',
            self::C00007->value => 'Error during authorisation',
            self::C00008->value => 'Psp request timeout',
            self::C00009->value => 'Uncategorized error during psp request',
            self::C00010->value => 'Conflict (409) returned by provider',
            self::C00011->value => 'Internal error. Unable to handle psp response. See logs.',
            self::C00012->value => 'Mpi authentication request timeout',
            self::CR0001->value => 'Payment declined by fraud service',
            self::C00013->value => 'Transaction not found on psp',
            self::C00014->value => 'Error during verification server request',
            self::C00015->value => 'Error during versioning request',
            self::C00016->value => 'Error during authentication request',
            self::C00017->value => 'Versioning request timeout',
            self::C00018->value => 'Authentication request timeout',
            self::C00019->value => 'Authentication failed',
            self::C00020->value => 'Authentication failed',
            self::C00021->value => 'Error during processing transaction',
            self::C10001->value => 'Unable to determine provider',
            self::C10002->value => 'Inconsistent configuration',
            self::C10003->value => 'Invalid amount',
            self::C10004->value => 'Unable to determine provider',
            self::C10005->value => 'Unable to determine provider',
            self::C10006->value => 'Unable to determine provider',
            self::C20009->value => 'Security failure',
            self::C20011->value => 'Suspected fraud',
            self::C20087->value => 'Card type not supported in 3DS',
            self::C40059->value => 'Suspected Fraud',
            self::C40063->value => 'Security violation',
            self::C40087->value => 'Update card or cardholder data before reattempt; pspExternalRespCode = 83',
            self::C40088->value => 'Try again later; pspExternalRespCode = 83',
            self::C50001->value => 'First transaction not found',
            self::C50002->value => 'First transaction invalid state',
            self::C50003->value => 'First transaction service target not matched',
            self::C50004->value => 'First transaction card token not matched',
            self::C50005->value => 'Unable to validate first transaction',
            self::C50006->value => 'First transaction missing data',
            self::C50007->value => 'Technical error',
            self::C30M69->value => 'Technical error',
            self::C30M68->value => 'Authentication process timed out',
            self::C30M66->value => 'Technical error',
            self::C30M65->value => 'Technical error',
            self::C30M64->value => 'Technical error',
            self::C30M63->value => 'Technical error',
            self::C30M50->value => 'An error occurred during the 3D secure process',
            self::C30M39->value => 'Technical error',
            self::C30M38->value => 'The transaction has been denied by the Gateway because 3D secure Authentication failed.',
            self::C30M37->value => 'Technical error',
            self::C30M36->value => 'Technical error',
            self::C30M35->value => 'Technical error',
            self::C30M33->value => 'Technical error',
            self::C30M32->value => 'Technical error',
            self::C30M30->value => 'Transaction Failed due to error in 3D secure process',
            self::C30M20->value => 'Processor authentication error.',
            self::C30M17->value => 'Technical error',
            self::C30M16->value => 'Technical error',
            self::C30M15->value => 'Technical error',
            self::C30M13->value => 'Technical error',
            self::C30M12->value => 'Technical error',
            self::C30M11->value => 'Format Error',
            self::C30M10->value => 'Internal server error.',
            self::C30M09->value => 'The parameter is malformed.',
            self::C30M08->value => 'The Package Signature is malformed.',
            self::C30M07->value => 'Incorrect Gateway Response. Connection is broken.',
            self::C30001->value => 'The transaction has been denied by the Gateway.',
            self::C30002->value => 'Technical error',
            self::C30003->value => 'Technical error',
            self::C30004->value => 'The transaction has been denied by the Gateway due to an interchange timeout.',
            self::C30005->value => 'The transaction has been declined.',
            self::C30006->value => 'Transaction pending cardholder authentication.',
            self::C30009->value => 'Technical error',
            self::C30010->value => 'The transaction has been partially approved.',
            self::C30011->value => 'The queried transaction is currently being processed.',
            self::C30013->value => 'Technical error',
            self::C30015->value => 'Technical error',
            self::C40001->value => 'Refer to card issuer',
            self::C40003->value => 'Technical error',
            self::C40004->value => 'Technical error',
            self::C40005->value => 'Do not honor',
            self::C40006->value => 'General error',
            self::C40007->value => 'Technical error',
            self::C40008->value => 'Honor with identification',
            self::C40012->value => 'Invalid transaction',
            self::C40013->value => 'Invalid transaction amount',
            self::C40014->value => 'Invalid card number',
            self::C40015->value => 'No such issuer',
            self::C40030->value => 'Format error',
            self::C40041->value => 'Merchant should retain card (card reported lost)',
            self::C40043->value => 'Merchant should retain card (card reported stolen)',
            self::C40046->value => 'Closed Card Account',
            self::C40051->value => 'Insufficient funds',
            self::C40054->value => 'Expired card',
            self::C40055->value => 'Incorrect PIN',
            self::C40057->value => 'Transaction not permitted to cardholder',
            self::C40058->value => 'Technical error',
            self::C40059->value => 'Suspected transaction. Contact Your Bank',
            self::C40061->value => 'Exceeds approval amount limit',
            self::C40062->value => 'Restricted Card',
            self::C40063->value => 'Technical error',
            self::C40065->value => 'Exceeds withdrawal frequency limit',
            self::C40075->value => 'Allowable number of PIN-entry tries exceeded',
            self::C40078->value => 'Blocked or card not activated',
            self::C40089->value => 'Account Closed – Do not try again',
            self::C40090->value => 'Cutoff is in process',
            self::C40091->value => 'Issuer unavailable or switch inoperative',
            self::C40093->value => 'Technical error',
            self::C40094->value => 'Duplicate transaction',
            self::C40096->value => 'System malfunction, System malfunction or certain field error conditions',
            self::C400N0->value => 'Unable to authorize / CVV2 failure',
            self::C400O5->value => 'Soft decline (SCA required)',
            self::C3PM14->value => 'At least one of the input parameters is missing. Parameter [X] is missing.',
            self::C3PM09->value => 'Transaction failed due to too many requests.',
            self::C3PM18->value => 'Payment Method not allowed for this merchant.',
            self::C3PM20->value => 'Operation not allowed for this merchant',
            self::C3PM21->value => 'Invalid Payment Method',
            self::C3PM22->value => 'Payment Method missing.',
            self::C3PM50->value => 'Transaction Amount not within pre-defined threshold.',
            self::C3PM52->value => 'Transaction Amount exceeds or does not match the Transaction amount referenced in the request.',
            self::C3PM53->value => 'Amount exceeds the Transaction Amount referenced in the request',
            self::C3PM55->value => 'The grand total amount does not match the item total amount.',
            self::C3PM64->value => 'The operation on the transaction referenced in the request has already been executed successful',
            self::C3PM66->value => 'Referral operation not allowed.',
            self::C3PM67->value => 'Could not find the original transaction. Make sure that it exists and that its details were transmitted correctly',
            self::C3PM80->value => 'Technical error',
            self::CR0004->value => 'Technical error',
            self::C20001->value => 'Card authentication failed',
            self::C20002->value => 'Unknown Device',
            self::C20003->value => 'Unsupported Device',
            self::C20004->value => 'Exceeds authentication frequency limit',
            self::C20005->value => 'Expired card',
            self::C20006->value => 'Invalid card number',
            self::C20007->value => 'Invalid transaction',
            self::C20008->value => 'No Card record',
            self::C20009->value => 'Technical error',
            self::C20010->value => 'Stolen card',
            self::C20011->value => 'Suspected fraud',
            self::C20012->value => 'Transaction not permitted to cardholder',
            self::C20013->value => 'Cardholder not enrolled in service',
            self::C20014->value => 'Transaction timed out / Abandoned transaction',
            self::C20015->value => 'Technical error',
            self::C20016->value => 'Technical error',
            self::C20017->value => 'Technical error',
            self::C20018->value => 'Technical error',
            self::C20019->value => 'Exceeds ACS maximum challenges',
            self::C20020->value => 'Non-Payment transaction not supported',
            self::C20021->value => 'Technical error',
            self::C20022->value => 'ACS technical issue',
            self::C20023->value => 'Decoupled Authentication required by ACS but not requested by 3DS Requestor',
            self::C20024->value => '3DS Requestor Decoupled Max Expiry Time exceeded',
            self::C20025->value => 'Decoupled Authentication was provided insufficient time to authenticate cardholder. ACS will not make attempt',
            self::C20026->value => 'Authentication attempted but not performed by the cardholder',
            self::C20101->value => '3DS Authentication Error',
            self::C20102->value => '3DS Authentication Error',
            self::C20103->value => '3DS Authentication Error',
            self::C20201->value => '3DS Authentication Error',
            self::C20202->value => '3DS Authentication Error',
            self::C20203->value => '3DS Authentication Error – Invalid data',
            self::C20204->value => '3DS Authentication Error – Duplicate Data Element',
            self::C20301->value => '3DS Authentication Error',
            self::C20302->value => '3DS Authentication Error',
            self::C20303->value => '3DS Authentication Error',
            self::C20304->value => '3DS Authentication Error – ISO Code Invalid',
            self::C20305->value => '3DS Authentication Error',
            self::C20306->value => '3DS Authentication Error – Invalid Merchant Category Code (MCC)',
            self::C20307->value => '3DS Authentication Error – Serial Number Not Valid',
            self::C20402->value => '3DS Authentication Error – Time Out',
            self::C20403->value => '3DS Authentication Error',
            self::C20404->value => '3DS Authentication Error',
            self::C20405->value => '3DS Authentication Error',
            self::E40330->value => 'Transaction failed, please refer to issuer',
            self::E40331->value => 'Message format error',
            self::E40333->value => 'Transaction does not exist / Abandoned transaction',
            self::E40334->value => 'Original transaction does not exist or state is incorrect',
            self::E40337->value => 'Invalid card number',
            self::E40339->value => 'Wrong PIN, expiry date or CVN2',
            self::E40340->value => 'Wrong cardholder ID information, mobile phone number or CVN2',
            self::E40341->value => 'You have entered your PIN too many times',
            self::E40342->value => 'Your card does not support this service',
        ];
    }
}