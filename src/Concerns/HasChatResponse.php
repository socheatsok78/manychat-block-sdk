<?php

namespace ManyChat\Dynamic\Concerns;

trait HasChatResponse
{
    /**
     * Evaluate chat response
     *
     * @param array $elements
     * @return array
     */
    protected function evaluateChatResponse($elements)
    {
        if (!$elements) {
            return [];
        }

        $response = [];

        foreach ($elements as $element) {
            array_push($response, $element->toWebDriver());
        }

        return $response;
    }
}
