<?php
namespace App\Http\Controllers\nn_cms;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\nn_site_users;
use App\Models\nn_company;
use App\Models\nn_job;
use App\Models\nn_transactions;
use App\Models\nn_user_works;
use App\Models\nn_package_transaction;
use App\Models\nn_package_lang;

class ManagerSiteUsers extends ManagerSiteController
{
    public function index(Request $request)
    {
        $data['items'] = nn_site_users::where('user_type', 0)->with([
            'categories' => function ($q) {
                $q->join('nn_category_lang', 'nn_category_lang.category_id', '=', 'nn_user_category.category_id')
                ->where('nn_category_lang.lang', getCurrentLocale())
                ->orderBy('nn_category_lang.created_at', 'desc');
            }
        ])
        ->when($request->get('id'), function ($q) use ($request) {
            return $q->where('nn_site_users.id', $request->get('id'));
        })
        ->paginate(20);

        if ($request->ajax()) {

            $view = view('nn_cms.pages.nn_site_users.site_user', $data);

            return response()->json(['view' => $view->render(), 'isMore' => $data['items']->hasMorePages()]);

        }

        return view('nn_cms.pages.nn_site_users.index', $data);
    }

    public function companies(Request $request)
    {
        $data['items'] = nn_company::join('nn_company_lang', 'nn_company_lang.company_id', '=', 'nn_company.id')->with([
            'categories' => function ($q) {
                $q->join('nn_category_lang', 'nn_category_lang.category_id', '=', 'nn_company_category.category_id')
                ->where('nn_category_lang.lang', getCurrentLocale())
                ->orderBy('nn_category_lang.created_at', 'desc');
            }
        ])
        ->join('nn_company_category', 'nn_company_category.company_id', '=', 'nn_company.id')
        ->join('nn_site_users', 'nn_site_users.id', '=', 'nn_company.user_id')
        ->select(
            'nn_company.id',
            'nn_company.logo',
            'nn_company.rating',
            'nn_company_lang.name',
            'nn_site_users.email',
            'nn_site_users.package_valid',
            'nn_site_users.add_projects_count',
            'nn_site_users.request_projects_count',
            'nn_site_users.tasks_count',
            'nn_site_users.package_end_date',
        )
        ->where('lang', getCurrentLocale())
        ->when($request->get('id'), function ($q) use ($request) {
            return $q->where('nn_company.id', $request->get('id'));
        })
        ->orderBy('nn_company.created_at', 'desc')
        ->groupBy('nn_company.id')
        ->paginate(15);

        foreach ($data['items'] as $item) {

            $jobs = nn_job::where([['company_id', $item->id], ['status', '!=', 0], ['nn_job_lang.lang', getCurrentLocale()]])
            ->join('nn_job_lang', 'nn_job_lang.job_id', '=', 'nn_job.id')
            ->select('nn_job.id', 'nn_job.user_id', 'nn_job.user_budget', 'nn_job.user_left_budget', 'nn_job.paid', 'nn_job_lang.name')
            ->get();

            foreach ($jobs as $jItem) {

                $userInfo = nn_site_users::where('id', $jItem->user_id)->first();
    
                if (isset ($userInfo->user_type)) {
                    if ($userInfo->user_type == 0) {
    
                        $jItem['user'] = $userInfo;
        
                    } elseif ($userInfo->user_type == 1) {
        
                        $companyInfo = nn_company::join('nn_company_lang', 'nn_company_lang.company_id', '=', 'nn_company.id')
                        ->select(
                                'nn_company.id',
                                'nn_company.logo',
                                'nn_company_lang.name',
                            )
                        ->where([['nn_company.user_id', $userInfo->id], ['nn_company_lang.lang', getCurrentLocale()]])
                        ->first();
        
                        $jItem['company'] = $companyInfo;
        
                    }
                }
                
            }

            $item['jobs'] = $jobs;

        }

        if ($request->ajax()) {

            $view = view('nn_cms.pages.nn_site_users.company', $data);

            return response()->json(['view' => $view->render(), 'isMore' => $data['items']->hasMorePages()]);

        }

        return view('nn_cms.pages.nn_site_users.companies', $data);
    }

    public function transactions(Request $request)
    {
        $data['items'] = nn_transactions::orderBy('created_at', 'desc')
        ->when($request->get('user_id'), function ($q) use ($request) {
            return $q->where('nn_transactions.user_id', $request->get('user_id'));
        })
        ->paginate(20);

        foreach ($data['items'] as $item) {

            $userId = $item->user_id;

            $userInfo = nn_site_users::where('id', $userId)->first();

            if ($userInfo->user_type == 0) {

                $item['receiver_user'] = $userInfo;

            } elseif ($userInfo->user_type == 1) {

                $companyInfo = nn_company::join('nn_company_lang', 'nn_company_lang.company_id', '=', 'nn_company.id')
                ->select(
                        'nn_company.id',
                        'nn_company.logo',
                        'nn_company_lang.name',
                    )
                ->where([['nn_company.user_id', $userInfo->id], ['nn_company_lang.lang', getCurrentLocale()]])
                ->first();

                $item['receiver_company'] = $companyInfo;

            }

            $item['company'] = nn_company::join('nn_company_lang', 'nn_company_lang.company_id', '=', 'nn_company.id')
            ->select(
                    'nn_company.id',
                    'nn_company.logo',
                    'nn_company_lang.name',
                )
            ->where([['nn_company.id', $item->company_id], ['nn_company_lang.lang', getCurrentLocale()]])
            ->first();

        }

        // dd ($data['items']);

        if ($request->ajax()) {

            $view = view('nn_cms.pages.nn_site_users.transaction', $data);

            return response()->json(['view' => $view->render(), 'isMore' => $data['items']->hasMorePages()]);

        }

        return view('nn_cms.pages.nn_site_users.transactions', $data);
    }

    public function packageTransactions(Request $request)
    {
        $data['items'] = nn_package_transaction::orderBy('created_at', 'desc')
        ->when($request->get('package_id'), function ($q) use ($request) {
            return $q->where('nn_package_transactions.package_id', $request->get('package_id'));
        })
        ->paginate(20);

        foreach ($data['items'] as $item) {

            $userId = $item->user_id;

            $userInfo = nn_site_users::where('id', $userId)->first();

            $item['package_name'] = nn_package_lang::where('package_id', $item->package_id)->where('lang', getCurrentLocale())->select('name')->first()['name'];

            if ($userInfo->user_type == 0) {

                $item['sender_user'] = $userInfo;

            } elseif ($userInfo->user_type == 1) {

                $companyInfo = nn_company::join('nn_company_lang', 'nn_company_lang.company_id', '=', 'nn_company.id')
                ->select(
                        'nn_company.id',
                        'nn_company.logo',
                        'nn_company_lang.name',
                    )
                ->where([['nn_company.user_id', $userInfo->id], ['nn_company_lang.lang', getCurrentLocale()]])
                ->first();

                $item['sender_company'] = $companyInfo;

            }

        }

        if ($request->ajax()) {

            $view = view('nn_cms.pages.nn_site_users.package_transaction', $data);

            return response()->json(['view' => $view->render(), 'isMore' => $data['items']->hasMorePages()]);

        }

        return view('nn_cms.pages.nn_site_users.package_transactions', $data);
    }
}
