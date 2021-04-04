# QueryBuilderV3.01

##input 
segment_logic:[
        [
            [ "created_at", "on","10-02-2090" ],
            [ "created_at", "on or after","10-02-2020" ],
            [ "created_at", "on","10-02-2021" ],
            [ "created_at", "on or after","10-02-2000" ]
        ],
        [
            "birth_day", "on or after","20-10-2020" 
        ],
        [
            "first_name", "starts with","ab" 
        ],
        [
            [ "first_name", "starts with","ab" ],
            [ "last_name", "contains","ha" ]
        ],
        [
            [ "first_name", "ends with","ab" ],
            [ "last_name", "is","ha" ]
        ]
]

##output: 
SELECT * FROM subscriptions WHERE  (  (  DATE(created_at)  =  '10-02-2090'  OR  DATE(created_at)  =  '10-02-2020'  OR  DATE(created_at)  =  '10-02-2021'  OR  DATE(created_at)  =  '10-02-2000'  )  AND  DATE(birth_day)  =  '20-10-2020'  AND  first_name  =  'ab'  AND  (  first_name  =  'ab'  OR  last_name  LIKE  '%ha%'  )  AND  (  first_name  =  'ab'  OR  last_name  =  'ha'  )  ) 

--------------

[POSTMAN COLLECTION](https://github.com/khanewu/QueryBuilderV3.01/blob/main/POSTMAN%20COLLECTON.zip)
