$result = '';
        foreach ($data as $key => $value) {
                if (strlen($result) == 0) {
                    $result = "Key,Value\r\n";
                }
                $result .= $key . ',' . $value . "\r\n";
        }
            $headers = [
                'Content-Type' => 'text/csv',
                'Content-Disposition' => 'attachment; filename="MyFileName.csv"'
            ];

            return Response::make($result, 200, $headers);