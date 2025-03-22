import Link from 'next/link'
import Image from 'next/image'
import * as Icon from '@phosphor-icons/react/dist/ssr'

const BlogItem = ({post,i}) => {
    return <div className='blog-item'>
        <Link className='blog-item-main h-full block bg-white border border-line overflow-hidden rounded-2xl hover-box-shadow duration-500' href="">
            <div className='bg-img w-full overflow-hidden'>
                <Image width={5000} height={5000} className='w-full h-full block' src={post.img} /> 
            </div>

            <div className='infor sm:p-6 p-4'>
                <div className='caption2 py-1 px-3 bg-surface rounded-full inline-block capitalize bg-blue-100'>{post.category}</div>
                <div className='heading6 mt-2'>{post.title}</div>

                <div className='date flex items-center gap-4 mt-2'>
                    <div className='author caption2 text-secondary'>
                    by <span className='text-on-surface'>Admin</span>
                    </div>
                    <div className='item-date flex items-center'>
                        <Icon.CalendarBlank weight='bold'/>
                        <span className='ml-1 caption2'>{post.date}</span>
                    </div> 
                </div> 
            </div> 
        </Link>                
    </div>  
};

export default BlogItem;