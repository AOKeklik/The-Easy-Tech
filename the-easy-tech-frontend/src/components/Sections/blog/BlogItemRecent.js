import React from 'react'
import Image from 'next/image'
import Link from 'next/link'
import * as Icon from '@phosphor-icons/react/dist/ssr'

import useInViewAnimation from "@/hooks/useInViewAnimation"
import { PATH_BLOG_DETAIL, URL_IMG } from '@/config/config';
import { formatDate } from '@/utils/dateFormatter'

const BlogItemRecent = ({data}) => {
    const { ref, style } = useInViewAnimation({ direction: "right" })

    return <Link 
        href={`${PATH_BLOG_DETAIL}/[id]/[slug]`}
        as={`${PATH_BLOG_DETAIL}/${data.id}/${data.slug}`} 
        ref={ref} 
		style={style}
        className='recent-post-item flex items-start gap-4 cursor-pointer' 
    >
        <div className='item-img flex-shrink-0 w-20 h-20 rounded'>
            <Image alt={data.title} width={5000} height={5000} src={URL_IMG+"/blog/"+data.image} className='w-full h-full object-cover'/> 
        </div>

        <div className='item-infor w-full'>
            <div className='item-date flex items-center'>
            <Icon.CalendarBlank weight='bold' />
            <span className='ml-1 caption2'>{formatDate(data.updated_at)}</span>  
            </div>
            <div className='item-title mt-1'>{data.title}</div>
        </div>
    </Link>
}

export default BlogItemRecent;