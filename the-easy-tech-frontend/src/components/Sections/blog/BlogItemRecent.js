import React from 'react'
import Image from 'next/image'
import Link from 'next/link'
import * as Icon from '@phosphor-icons/react/dist/ssr'

import useInViewAnimation from "@/hooks/useInViewAnimation"

const BlogItemRecent = ({post}) => {
    const { ref, style } = useInViewAnimation({ direction: "right" })

    return <Link 
        href="/blog/blog-detail/[slug]"
        as={`/blog/blog-details/${post.title.toLowerCase().replace(/ /g,"-")}`} 
        ref={ref} 
		style={style}
        className='recent-post-item flex items-start gap-4 cursor-pointer' 
    >
        <div className='item-img flex-shrink-0 w-20 h-20 rounded'>
            <Image width={5000} height={5000} src={post.img} className='w-full h-full object-cover'/> 
        </div>

        <div className='item-infor w-full'>
            <div className='item-date flex items-center'>
            <Icon.CalendarBlank weight='bold' />
            <span className='ml-1 caption2'>{post.date}</span>  
            </div>
            <div className='item-title mt-1'>{post.title}</div>
        </div>
    </Link>
}

export default BlogItemRecent;