<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\ContactRequest;
use App\Http\Requests\Site\StudentRegistrationRequest;
use App\Http\Resources\Site\AboutResource;
use App\Http\Resources\Site\BannerResource;
use App\Http\Resources\Site\BlogResource;
use App\Http\Resources\Site\EventResource;
use App\Http\Resources\Site\PhotoResource;
use App\Http\Resources\Site\ProjectResource;
use App\Http\Resources\Site\VideoResource;
use App\Http\Resources\Site\FeedbackResource;
use App\Http\Resources\Site\PartnersResource;
use App\Http\Resources\Site\AdvantagesResource;
use App\Http\Resources\Site\StatisticsResource;
use App\Models\Site\SiteAbout;
use App\Models\Site\SiteAdvantage;
use App\Models\Site\SiteBanner;
use App\Models\Site\SiteBlog;
use App\Models\Site\SiteContact;
use App\Models\Site\SiteEvent;
use App\Models\Site\SiteFeedback;
use App\Models\Site\SitePartners;
use App\Models\Site\SitePhoto;
use App\Models\Site\SiteProjects;
use App\Models\Site\SiteStatistics;
use App\Models\Site\SiteTeacher;
use App\Models\Site\SiteVideo;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    function index()
    {

        $blogs = $this->prepare_data(BlogResource::collection(SiteBlog::with('images')->limit(6)->get()));
        $events = $this->prepare_data(EventResource::collection(SiteEvent::with('images')->limit(6)->get()));
        $projects = $this->prepare_data(ProjectResource::collection(SiteProjects::with('city','district')->limit(6)->get()));
        $about_all = $this->prepare_data(AboutResource::collection(SiteAbout::all()));
        $banners = $this->prepare_data(BannerResource::collection(SiteBanner::all()));
        $feedback = $this->prepare_data(FeedbackResource::collection(SiteFeedback::all()));
        $partner = $this->prepare_data(PartnersResource::collection(SitePartners::all()));
        $statistics = $this->prepare_data(StatisticsResource::collection(SiteStatistics::all()));
        $advantages = $this->prepare_data(AdvantagesResource::collection(SiteAdvantage::all()));
        $about=array();
        $boute_row=SiteAbout::first();
        if(!empty($boute_row)){
            $about = $this->prepare_data(new AboutResource($boute_row));
        }
 //dd($about);
        return view('web_site.home', compact('banners', 'about', 'events',
         'blogs','feedback','partner','statistics','advantages','projects'));
    }

    function about()
    {
        $about = $this->prepare_data(AboutResource::collection(SiteAbout::all()));
          // dd($about);
        return view('web_site.about', compact('about'));

    }

    function teacher(Request $request)
    {
        $all = SiteTeacher::paginate(12);
//        $data['teacher'] = $this->prepare_data(TeacherResource::collection($data['all']));
        return view('web_site.teacher', compact('all'))
            ->with('i', ($request->input('page', 1) - 1) * 12);
    }

    function video(Request $request)
    {
        $videos = SiteVideo::paginate(12);
//        $videos = $this->prepare_data(VideoResource::collection($data['all']));
        return view('web_site.videos', compact('videos'))
            ->with('i', ($request->input('page', 1) - 1) * 12);
    }

    function photos(Request $request)
    {
        $photos = SitePhoto::with('images')->paginate(12);
//        $data['photos'] = $this->prepare_data(PhotoResource::collection($data['all']));
        return view('web_site.gallery.gallery', compact('photos'))
            ->with('i', ($request->input('page', 1) - 1) * 12);
    }
    function photosDetails(Request $request, $id)
    {
        $one_data = SitePhoto::with('images')->findorfail($id);
        $one_data = $this->prepare_data(new PhotoResource($one_data));
        $all = SitePhoto::with('images')->limit(12);
//        dd($one_data);
        return view('web_site.gallery.gallery_details', compact('one_data', 'all'));

    }
    function contact_us(Request $request)
    {

        return view('web_site.contact');
    }

    function SaveContact_us(ContactRequest $request)
    {
        try {
            $insert_data = $request->all();

            $inserted_data = SiteContact::create($insert_data);

            toastr()->addSuccess(trans('forms.success'));
            return redirect()->route('contact_us');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    function StudentRegistration(Request $request)
    {
        return view('web_site.StudentRegistration');
    }

    function SaveStudentRegistration(StudentRegistrationRequest $request)
    {
        try {
            $insert_data = $request->all();

            $inserted_data = student_registration::create($insert_data);

            toastr()->addSuccess(trans('forms.success'));
            return redirect()->route('StudentRegistration');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    function blogs(Request $request)
    {
        $all = SiteBlog::with('images')->paginate(12);
        // dd($all);
        return view('web_site.blogs.blog', compact('all'))->with('i', ($request->input('page', 1) - 1) * 12);
    }

    function one_blog(Request $request, $id)
    {
        $one_data = SiteBlog::findorfail($id);
        $one_data = $this->prepare_data(new BlogResource($one_data));
        $all = SiteBlog::with('images')->limit(12);
//        dd($one_data);
        return view('web_site.blogs.blog_detail', compact('one_data', 'all'));

    }

    function projects(Request $request)
    {
        $all = SiteProjects::with('images')->paginate(12);
        // dd($all);
        return view('web_site.projects.projects', compact('all'))->with('i', ($request->input('page', 1) - 1) * 12);
    }

    function one_project(Request $request, $id)
    {
        $one_data = SiteProjects::findorfail($id);
        $one_data = $this->prepare_data(new ProjectResource($one_data));
        $all = SiteProjects::with('images')->limit(12);
//        dd($one_data);
        return view('web_site.projects.project_detail', compact('one_data', 'all'));

    }

    function events(Request $request)
    {
        $all = SiteEvent::with('images')->paginate(3);
//        $all = $this->prepare_data(new EventCollection($data['allData']));
//dd($all,$data['allData']);
        return view('web_site.events.events', compact('all'))->with('i', ($request->input('page', 1) - 1) * 12);

    }

    function one_events(Request $request, $id)
    {
        $one_data = SiteEvent::findorfail($id);
        $one_data = $this->prepare_data(new EventResource($one_data));

//        dd($one_data);
        return view('web_site.events.eventDetails', compact('one_data'));

    }
}
