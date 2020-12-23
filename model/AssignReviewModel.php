<?php


namespace app\model;


use app\core\BaseModel;
use Exception;

class AssignReviewModel extends BaseModel {

    var string $userId;
    var string $guideId;


    function validate() {
        if (empty($this->userId)) {
            throw new Exception('Error, user id is empty');
        }

        if (!is_numeric($this->userId)) {
            throw new Exception('Error, user id is not a number');
        }

        if (empty($this->guideId)) {
            throw new Exception('Error, guide id is empty');
        }

        if (!is_numeric($this->guideId)) {
            throw new Exception('Error, guide id is not a number');
        }
    }

    function assignReview() {
        $statement = 'INSERT INTO review (reviewer_id, guide_id) VALUES (?, ?)';
        $query = $this->prepare($statement);
        $query->execute([$this->userId, $this->guideId]);
    }
}