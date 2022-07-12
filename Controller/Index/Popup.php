<?php
namespace Chetu\HPopup\Controller\Index;

class Popup extends \Magento\Framework\App\Action\Action
{
	protected $_pageFactory;

	public function __construct(
		\Magento\Framework\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $pageFactory,
		\Magento\Framework\App\ResourceConnection $resource,
		\Magento\Customer\Model\CustomerFactory $customerFactory)
	{
		$this->_pageFactory = $pageFactory;
		$this->_resource = $resource;
		$this->customerFactory = $customerFactory;
		return parent::__construct($context);
	}

	public function execute()
	{
		$connection = $this->_resource;
		$conn=$connection->getConnection();

		// if (!$conn){
        //     echo "Connection to the database failed."; 
        // }else{
        // echo "Successfully connected to the database";
		// }
		// echo "<br>";

		$fname = $this->getRequest()->getParam('firstName');
		$lname = $this->getRequest()->getParam('lastName');
		$gender = $this->getRequest()->getParam('gender');
		$email = $this->getRequest()->getParam('email');
		

		$name = $fname.' '.$lname;

		$sql = "INSERT INTO `custum_popup_data`(`name`, `gender`, `email`)  VALUES ('$name','$gender','$email')";

		$conn->query($sql);
		echo "<script>alert('Data submitted successfully')</script>";	

		}
	
} 
