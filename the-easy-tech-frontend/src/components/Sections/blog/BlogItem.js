"use client"

import Image from 'next/image'
import Link from 'next/link'
import * as Icon from '@phosphor-icons/react/dist/ssr'
import useInViewAnimation from "@/hooks/useInViewAnimation"

const BlogItem = ({post}) => {
    const { ref, style } = useInViewAnimation({ direction: "up" })

    return <Link 
        href="/blog/blog-detail/[slug]"
        as={`/blog/blog-details/${post.title.toLowerCase().replace(/ /g,"-")}`} 
        ref={ref} 
		style={style}
        className='blog-item flex max-md:flex-col md:items-center gap-7 gap-y-5' 
    >
        <div className='w-full md:w-1/2'>
            <div className='bg-img w-full overflow-hidden rounded-2xl'>
                <Image width={5000} height={5000} className='w-full h-full block' src={post.img} alt={post.title} />  
            </div> 
        </div>
        <div className='w-full md:w-1/2'>
            <div className='caption2 py-1 px-3 bg-surface rounded-full inline-block capitalize bg-slate-100'>{post.category}</div>
            <div className='heading6 mt-2'>{post.title}</div>
            <div className='date flex items-center gap-4 mt-2'>
                <div className='author caption2 text-secondary'> By <span className='text-onsurface'>{post.author}</span></div>
                <div className='item-date flex items-center'>
                    <Icon.CalendarBlank weight='bold' />
                    <span className='ml-1 caption2'>{post.date}</span> 
                </div> 
            </div>                                        
            <div className='body3 text-secondary mt-4 pb-4'>{post.desc}</div>
            <div className='read font-bold underline'>Read More</div>
        </div>
    </Link>
};

export default BlogItem;