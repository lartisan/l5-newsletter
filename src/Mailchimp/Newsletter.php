<?php

namespace Cristake\Newsletter\Mailchimp;

use Exception;
use Mailchimp\Mailchimp;
use Cristake\Newsletter\Interfaces\NewsletterInterface;
use Cristake\Newsletter\Interfaces\NewsletterListInterface;
use Cristake\Newsletter\Interfaces\NewsletterMemberInterface;

class Newsletter implements NewsletterInterface
{
    /**
     * @var string
     */
    private $apikey;


    /**
     * @var NewsletterList
     */
    private $list;


    /**
     * @var NewsletterMember
     */
    private $member;


    /**
     * @var NewsletterCampaign
     */
    // private $campaign;


    /**
     * Inject the subresources
     */
    public function __construct(
        NewsletterListInterface $list,
        NewsletterMemberInterface $member
    	// NewsletterCampaignInterface $campaign
	)
    {
        $this->list = $list;
        $this->member = $member;
        // $this->campaign = $campaign;
    }


    /**
     * Display all available lists
     *
     * @return Illuminate\Support\Collection       
     */
    public function allLists(array $options = [])
    {
    	return $this->list
            ->all($options);
    }

    /**
     * Create a new list
     *
     * Mandatory parameters:
     * name, permission_reminder, email_type_option, contact, campaign_defaults
     *
     * @param  array  $parameters
     *
     * @return mixed  
     */
    public function createList(array $parameters)
    {
    	return $this->list
            ->store($parameters);
    }


    /**
     * Shows the list details
     *
     * @param  string  $listId
     * @param  array  $options
     *
     * @return mixed  
     */
    public function showList($listId, array $options = [])
    {
        return $this->list
            ->show($listId, $options);

    }


    /**
     * Delete a list
     *
     * @param  string  $listId
     *
     * @return mixed  
     */
    public function deleteList($listId)
    {
    	return $this->list
            ->destroy($listId);
    }


    /**
    
     * List all members of a list
     *
     * @param  string  $listId
     * @param  array  $options
     *
     * @return mixed  
     */
    public function listMembers($listId, array $options = [])
    {
        return $this->member
            ->index($listId, $options);
    }


}