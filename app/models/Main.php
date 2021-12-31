<?php
class Main extends Model
{
    public function __construct()
    {
    }

    public function test()
    {
        $data = [
            'members' => [
                "Kesara Karannagoda",
                "Avishka Hettiarachchi",
                "Razzeen Nizar",
                "Kavindu Galagedara"
            ]
        ];
        $this->response(SUCCESS_RESPONSE, $data);
    }
}
