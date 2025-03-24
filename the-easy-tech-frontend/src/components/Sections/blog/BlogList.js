import * as Icon from '@phosphor-icons/react/dist/ssr'
import BlogItem from './BlogItem';
import BlogItemRecent from './BlogItemRecent'

import usePagination from "@/hooks/usePagination"

const BlogList = ({posts,categories}) => {
    const { currentData, paginationControls } = usePagination(posts, 3)

    return <div className='list-blog lg:py-[100px] sm:py-16 py-10'>
        <div className='container'>
            <div className='flex max-lg:flex-col gap-y-10'>
                <div className='w-full lg:w-2/3'>
                    <div className='list flex flex-col gap-y-10'>
                        {
                            currentData.map((post,i) => <BlogItem key={i} post={post} />)
                        }
                        {paginationControls}
                    </div> 
                </div>
                <div className='w-full lg:w-1/3 lg:pl-[55px]'>
                    <div className='search-block rounded-lg bg-surface h-[50px] relative'>
                        <input className='rounded-lg bg-surface w-full h-full pl-4 pr-12 bg-slate-100' type="text" placeholder='Search' />
                        <Icon.MagnifyingGlass className='absolute top-1/2 -translate-y-1/2 right-4 text-xl cursor-pointer' /> 
                    </div>
                    <div className='cate-block md:mt-10 mt-6'>
                        <div className='heading6'>Blog Category</div> 
                        <div className='list-nav mt-4'>
                            {
                                categories.slice(0,3).map((cat,i) => <div key={i} className="text-button text-secondary mt-2 cursor-pointer font-extrabold">
                                        {cat.name} 
                                    </div>
                                )
                            }
                        </div>  
                    </div>
                    <div className='recent-post-block md:mt-10 mt-6'>
                        <div className='recent-post-heading heading7'>Recent Post</div>
                        <div className='list-recent-post flex flex-col gap-6 mt-4'>
                            {
                                posts.reverse().slice(0,3).map((post,i) => <BlogItemRecent key={i} post={post} />)
                            }
                        </div>
                    </div>
                </div> 
            </div> 
        </div>
    </div>
};

export default BlogList;