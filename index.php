<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    require 'vendor/autoload.php';
    $test = "ta mère";
        $query = '
            query ($id: Int) { # Define which variables will be used in the query (id)
            Media (id: $id, type: ANIME) { # Insert our variables into the query arguments (id) (type: ANIME is hard-coded in the query)
                id
                title {
                romaji
                english
                native
                }
            }
            }
        ';
        // Define our query variables and values that will be used in the query request
        $variables = [
            "id" => 15125
        ];
        // Make the HTTP Api request
        $http = new GuzzleHttp\Client;
        var_dump($http);
        $response = $http->post('https://graphql.anilist.co', [
            'json' => [
                'query' => $query,
                'variables' => $variables,
            ]
        ]);

        var_dump($response);
    ?>
</body>
</html>