<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Profile;
use Illuminate\Validation\Rule;
use Illuminate\Support\Carbon;
use Illuminate\Support\Arr;

class EditProfile extends Component
{

	public Profile $profile;

	public $bio;

	public $basic;

	public $education;

	public $work;

	public $newEducation = [];

    public $newWork = [];

	protected $validationAttributes = [
        'basic.gender' => 'gender ',
		'basic.relationship' => 'relationship',
		'basic.nickname' => 'nickname',
		'basic.mobile' => 'mobile #',
		'basic.website' => 'website',
		'basic.location' => 'location',
		'newEducation.school' => 'school name',
		'newEducation.program' => 'program',
		'newEducation.to' => 'from year',
        'newEducation.from' => 'end year',
        'newWork.company' => 'company name',
        'newWork.position' => 'position',
        'newWork.to' => 'from year',
        'newWork.from' => 'end year',
    ];

    protected $messages = [
        'newEducation.to.gt' => 'Invalid year.',
        'newWork.to.gt' => 'Invalid year.',
    ];  

	public function mount(Profile $profile)
	{	
		$this->profile = $profile;
		$this->bio = $profile->bio;
		$this->basic = [
			'gender' => $profile->gender,
			'relationship' => $profile->relationship,
			'nickname' => $profile->nickname,
			'mobile' => $profile->mobile,
			'location' => $profile->location,
			'website' => $profile->website,
		];
		$this->education = $profile->education ?? [];
        $this->work = $profile->work ?? [];
	}

    public function render()
    {
        return view('livewire.edit-profile');
    }

    public function updateBio()
    {
    	$this->validate(['bio' => 'max:500']);

    	$this->profile->update(['bio' => $this->bio]);

    	session()->flash('msg_bio', 'Profile bio is updated successfully');
    }

    public function updateBasicInfo()
    {	
    	$this->validate([
    		'basic.gender' => [
    			'required',
    			Rule::in('Male', 'Female', 'Secret')
    		],
    		'basic.relationship' => [
    			'required',
    			Rule::in('In relationship', 'Single', 'Married', 'Divorced', 'Engaged', 'Annuled', 'It\'s complicated', 'Open for dating')
    		],
    		'basic.nickname' => 'max:20',
    		'basic.mobile' => 'size:11',
    		'basic.website' => 'url|max:255',
    		'basic.location' => 'max:255',
    	]);

    	$this->profile->update([
    		'gender' => $this->basic['gender'],
				'relationship' => $this->basic['relationship'],
				'nickname' => $this->basic['nickname'],
				'mobile' => $this->basic['mobile'],
				'location' => $this->basic['location'],
				'website' => $this->basic['website'],
    	]);


    	session()->flash('msg_basic', 'Profile\'s basic info is updated successfully');
    }

    public function updateEducation()
    {
    	$this->validate([
    		'newEducation.school' => 'required|max:255',
    		'newEducation.program' => 'max:255',
    		'newEducation.from' => [          
                'numeric',
                'between:1900, '. Carbon::now()->format('Y'),
            ],
    		'newEducation.to' => [               
                'numeric' ,
                'between:1900, '. Carbon::now()->format('Y'),
                'gte:'.(Arr::has($this->newEducation, 'from')?$this->newEducation['from']:'0'),
            ]
    	]);

        $updatedEducation = Arr::prepend($this->education, $this->newEducation);

        $this->profile->update(['education' => $updatedEducation]);

        $this->reset('newEducation');

        $this->education = $updatedEducation;

        session()->flash('msg_education', 'New education is created successfully.');
    }

    public function removeEducation($index)
    {      
        $updatedEducation = Arr::except($this->education, $index);

        $this->profile->update(['education' => $updatedEducation]);

        $this->education = $updatedEducation;

        session()->flash('msg_education', 'An education is removed successfully.');
    }


    public function updateWork()
    {
        $this->validate([
            'newWork.company' => 'required|max:255',
            'newWork.position' => 'required|max:255',
            'newWork.from' => [          
                'numeric',
                'between:1900, '. Carbon::now()->format('Y'),
            ],
            'newWork.to' => [               
                'numeric' ,
                'between:1900, '. Carbon::now()->format('Y'),
                'gte:'.(Arr::has($this->newWork, 'from')?$this->newWork['from']:'0'),
            ]
        ]);

        $updatedWork = Arr::prepend($this->work, $this->newWork);

        $this->profile->update(['work' => $updatedWork]);

        $this->reset('newWork');

        $this->work = $updatedWork;

        session()->flash('msg_work', 'New work is created successfully.');
    }

     public function removeWork($index)
    {      
        $updatedWork = Arr::except($this->work, $index);

        $this->profile->update(['work' => $updatedWork]);

        $this->work = $updatedWork;

        session()->flash('msg_work', 'A work is removed successfully.');
    }

}
